<?php
require_once('init.php');
class Submission extends View {
	function get() {
		$token = $_GET['token'];
		$auth = \Models\Auth::get(\db::get(), $token);

		if ($auth['scope'] == 'people_an') {
			$this->smarty->assign('scope', __CLASS__);
			$this->smarty->assign('token', $token);
			$this->smarty->display('submission_creation.html');
		} else {
			$this->smarty->assign('scope', __CLASS__);
			$this->smarty->display('submission.html');
		}
	}
	function post() {
		$token = $_GET['token'];
		$conn = \db::get();
		$auth = \Models\Auth::get($conn, $token);

		if ($auth['scope'] == 'people_an') {
			$type = $_POST['type'];
			$email = $_POST['email'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$title = $_POST['inputtitle'];
			$abstract = $_POST['inputabstract'];
			$session_code = $_POST['inputsessioncode'];
			if (empty($first_name)) {
				header('Location: ' . TOP . 'admin/index.php?token='.$token);
				return;
			}
			try {
				$_id = \Models\People::insert($conn, $type, $first_name, $last_name, $email);
			} catch (\Exception $e) {
				echo $e->getMessage();
			}
			$_token = self::generatorPassword(8);
			
			\Models\Auth::insert($conn, 'people', $_id, $_token);
			\Models\People::update_limited($conn, $_id, $title, $abstract, $session_code);
			$conn->close();
			header('Location: ' . TOP . 'person/main.php?token='.$_token);
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
