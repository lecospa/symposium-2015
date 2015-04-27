<?php
namespace ISpeaker;
require_once('../init.php');

class MMain extends \View {
	function get() {
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
}
new MMain;
