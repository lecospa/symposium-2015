<?php
namespace Person;
require_once('../init.php');

class Person extends \Controllers\Controller {
	public function get() {
		$mode = $_GET['mode'];
		switch ($mode) {
		case 'edit':
			$this->get_edit();
			break;
		default:
			$id = $_GET['person_id'];
			$conn = new \Conn;
			$talks = \Models\Talks::all_filter_session_and_person($conn, 'Plenary', $id);

			if (count($talks) == 0) {
				throw new \NotFoundException();
			}
			header("HTTP/1.1 301 Moved Permanently"); 
			header('Location: ' . TOP . '/plenary_sessions/' . $talks[0]['id']);
			break;
		}
	}
	private function get_edit() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'people') {
			if (isset($_SESSION['message'])) {
				$this->smarty->assign('message', $_SESSION['message']);
				unset($_SESSION['message']);
			}

			$person_id = $auth['id'];
			$person = \Models\People::get($conn, $person_id);
			$talks = \Models\Talks::all_filter_person($conn, $person_id);

			$sessions = \Models\Sessions::all_with_id_as_key($conn);

			$this->smarty->assign('person', $person);
			$this->smarty->assign('talks', $talks);
			$this->smarty->assign('token', $token);
			$this->smarty->assign('sessions', $sessions);
			$this->smarty->display('person.edit.tpl');
		} else {
			$this->smarty->display('person.edit.noauth.tpl');
		}
	}
}
new Person;
