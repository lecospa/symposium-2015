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
			$session_code = $_POST['inputsessioncode'];
			\Models\People::update_limited($conn, $auth['id'], $title, $abstract, $session_code);

			$info = \Models\People::get($conn, $auth['id']);
			$this->smarty->assign('person', $info);
			$this->smarty->assign('token', $token);
			$this->smarty->display('person/main.html');
		} else {
			$this->smarty->display('person/main-noauth.html');
		}
	}
}
new MMain;
