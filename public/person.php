<?php
namespace Person;
require_once('../init.php');

class Person extends \Controllers\Controller {
	public function get() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'people') {
			$person_id = $auth['id'];
			$person = \Models\People::get($conn, $person_id);

			if (isset($_SESSION['message'])) {
				$this->smarty->assign('message', $_SESSION['message']);
				unset($_SESSION['message']);
			}

			$stmt = $conn->prepare("SELECT * FROM `talks` WHERE `person_id`=?");
			$stmt->execute(array($person_id));
			$talks = $stmt->fetchAll(\PDO::FETCH_ASSOC);

			$sessions = \Models\Sessions::all($conn);

			$this->smarty->assign('person', $person);
			$this->smarty->assign('talks', $talks);
			$this->smarty->assign('token', $token);
			$this->smarty->assign('sessions', $sessions);
			$this->smarty->display('person.edit.tpl');
		} else {
			$this->smarty->display('person.edit.noauth.tpl');
		}
	}
	public function post() {
		/*$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'people') {
			$title = $_POST['inputtitle'];
			$abstract = $_POST['inputabstract'];
			$session_id = $_POST['inputsessioncode'];
			\Models\People::update_limited($conn, $auth['id'], $title, $abstract, $session_id);

			$_SESSION['message'] = 'Update successfully';

			header('Location: main.php?token=' . $token);
		} else {
			header('Location: main.php?token=' . $token);
		}*/
	}
}
new Person;
