<?php
namespace Person;
require_once('../init.php');

class Person extends \Controllers\Controller {
	public function get() {
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
