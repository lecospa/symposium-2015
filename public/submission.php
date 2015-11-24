<?php
require_once('../init.php');
class Submission extends \Controllers\Controller {
	function get() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);

		if ($auth && $auth['scope'] == 'people_an') {
			$this->smarty->assign('scope', __CLASS__);
			$this->smarty->assign('token', $token);

			$sessions = \Models\Sessions::all($conn);
			$this->smarty->assign('sessions', $sessions);
			$this->smarty->display('submission_creation.html');
		} else {
			$this->smarty->assign('scope', __CLASS__);
			$this->smarty->display('submission.html');
		}
	}
	function post() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		$logger = new \Models\Logging($conn, $_SERVER);

		if ($auth['scope'] == 'people_an') {
			$email        = $_POST['email'];
			$first_name   = $_POST['first_name'];
			$last_name    = $_POST['last_name'];

			$session      = $_POST['session'];
			$title        = $_POST['title'];
			$abstract     = $_POST['abstract'];
			$session_id = $_POST['session_id'];
			if (empty($first_name) || empty($last_name) || empty($email)) {
				header('Location: ' . TOP . '/submission.php?token='.$token);
				return;
			}
			$_id = \Models\People::insert($conn, $first_name, $last_name, $email);
			$_token = self::generatorPassword(8);
			\Models\Auth::insert($conn, 'people', $_id, $_token);

			$stmt = $conn->prepare("INSERT INTO `talks` (`person_id`, `title`, `abstract`, `session`, `session_id`) VALUES (?,?,?,?,?)");
			$stmt->execute(array($_id, $title, $abstract, $session, $session_id));
			$logger->info('New Person', json_encode(array('id' => $_id, 'title'=> $title)));

			{
				$to = $email;
				$subject = '[Lecospa] Passcode for title and abstract modification - 2nd Symposium';
				$message = 
					"Dear $first_name, \r\n" . 
					"Thank you for your title and abstract submission.\r\n" . "\r\n" . 
					"We provide you the 8 characters Passcode ``$_token'' to modifying your submission.\r\n" . 
					"The passcode is required entering into \r\nhttp://lecospa.ntu.edu.tw/symposium/2015/submission.php .\r\n" . 
					"Or, you can use the following link \r\nhttp://lecospa.ntu.edu.tw/symposium/2015/person/main.php?token=$_token to modify your submission.\r\n" . "\r\n" . 
					"Sincerely, \r\n2nd LeCosPA Symposium Team";
				$headers = 'From: no-reply@lecospa.ntu.edu.tw' . "\r\n" . 'Reply-To: symposium@lecospa.ntu.edu.tw';

				$logger->info('Email', json_encode(array('id' => $_id, 'email' => $to, 'message' => $message)));

				mail($to, $subject, $message, $headers);
			}
			$_SESSION['message'] = 'Thank you for your submission, your passcode is ' . $_token;
			header('Location: ' . TOP . '/person/main.php?token='.$_token);
		}
	}
	private function generatorPassword($password_len) {
		$password = '';
		$word = 'abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ23456789';
		$len = strlen($word);
		for ($i = 0; $i < $password_len; $i++) {
			$password .= $word[rand() % $len];
		}
		return $password;
	}
}
new Submission;
