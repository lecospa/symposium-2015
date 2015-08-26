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

			$this->smarty->assign('person', $person);
			$this->smarty->assign('token', $token);
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
			$type = $_POST['inputtype'];
			$session_code = $_POST['inputsessioncode'];

			if ($type != 'Plenary' && $type != 'Parallel' && $type != 'Poster' && $type != 'Normal') {
				throw new \ForbiddenException();
			}

			\Models\People::update_limited($conn, $auth['id'], $title, $abstract, $type, $session_code);

			$_SESSION['message'] = 'Update successfully';

			header('Location: main.php?token=' . $token);
		} else {
			throw new \UnauthorizedException();
		}
	}
}
new MMain;
