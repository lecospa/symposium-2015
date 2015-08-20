<?php
namespace ISpeaker;
require_once('../init.php');

class MMain extends \View {
	public function get() {
		$token = $_GET['token'];
		$conn = \db::get();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'people') {
			$info = \Models\People::get($conn, $auth['id']);
			$this->smarty->assign('person', $info);
			$this->smarty->assign('token', $token);
			$this->smarty->display('person/main.html');
		} else {
			$this->smarty->display('person/main-noauth.html');
		}
		$conn->close();
	}
	public function post() {
		$token = $_GET['token'];
		$conn = \db::get();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'people') {
			$first_name = $_POST['inputfirstname'];
			$last_name = $_POST['inputlastname'];
			$email = $_POST['inputemail'];
			$title = $_POST['inputtitle'];
			$abstract = $_POST['inputabstract'];
			$address_datetime = $_POST['inputaddressdatetime'];
			$occupation = $_POST['inputoccupation'];
			$resume = $_POST['inputresume'];
			$room = $_POST['inputroom'];
			\Models\People::update_($conn, $auth['id'], $first_name, $last_name, $email, $title, $abstract, $address_datetime, $occupation, $resume, $room);

			$info = \Models\People::get($conn, $auth['id']);
			$this->smarty->assign('person', $info);
			$this->smarty->assign('token', $token);
			$this->smarty->display('person/main.html');
		} else {
			$this->smarty->display('person/main-noauth.html');
		}
		$conn->close();
	}
}
new MMain;
