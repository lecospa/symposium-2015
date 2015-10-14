<?php
namespace Person;
require_once('../init.php');

class MMain extends \View {
	public function get() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'people') {
			$person = \Models\People::get($conn, $auth['id']);

			if (isset($_SESSION['message'])) {
				$this->smarty->assign('message', $_SESSION['message']);
				unset($_SESSION['message']);
			}

			$sessions = \Models\Sessions::all($conn);
			foreach ($sessions as &$session) {
				$session['title'] = \Models\Sessions::get_property($conn, $session['id'], 'title')['value'];
			}

			$this->smarty->assign('person', $person);
			$this->smarty->assign('token', $token);
			$this->smarty->assign('sessions', $sessions);
			$this->smarty->display('person/main.html');
		} else {
			$this->smarty->display('person/main-noauth.html');
		}
	}
	public function post() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'people') {
			$title = $_POST['inputtitle'];
			$abstract = $_POST['inputabstract'];
			$session_code = $_POST['inputsessioncode'];
			\Models\People::update_limited($conn, $auth['id'], $title, $abstract, $session_code);
			\Models\Sessions::delete_property_by_name_value($conn, 'speaker', $auth['id']);
			\Models\Sessions::insert_property($conn, $session_code, 'speaker', $auth['id']);

			$_SESSION['message'] = 'Update successfully';

			header('Location: main.php?token=' . $token);
		} else {
			header('Location: main.php?token=' . $token);
		}
	}
}
new MMain;
