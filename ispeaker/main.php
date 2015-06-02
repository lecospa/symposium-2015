<?php
namespace ISpeaker;
require_once('../init.php');

class MMain extends \View {
	public function get() {
		$token = $_GET['token'];
		
		$auth = \Models\Auth::get(\db::get(), $token);
		if ($auth['scope'] == 'ispeakers') {
			$info = \Models\ISpeakers::get(\db::get(), $auth['id']);
			$this->smarty->assign('ispeaker', $info);
			$this->smarty->assign('token', $token);
			$this->smarty->display('ispeaker/main.html');
		} else {
			$this->smarty->display('ispeaker/main-noauth.html');
			//header('location: ../ispeakers.php');
		}
	}
	public function post() {
		$token = $_GET['token'];
		$auth = \Models\Auth::get(\db::get(), $token);
		if ($auth['scope'] == 'ispeakers') {
			$title = $_POST['inputtitle'];
			$abstract = $_POST['inputabstract'];
			$address_datetime = $_POST['inputaddressdatetime'];
			$occupation = $_POST['inputoccupation'];
			$resume = $_POST['inputresume'];
			$room = $_POST['inputroom'];
			$conn = \db::get();
			\Models\ISpeakers::update_($conn, $auth['id'], $title, $abstract, $address_datetime, $occupation, $resume, $room);

			$info = \Models\ISpeakers::get(\db::get(), $auth['id']);
			$this->smarty->assign('ispeaker', $info);
			$this->smarty->assign('token', $token);
			$this->smarty->display('ispeaker/main.html');
		} else {
			$this->smarty->display('ispeaker/main-noauth.html');
		}
	}
}
new MMain;
