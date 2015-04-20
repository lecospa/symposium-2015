<?php
namespace ISpeaker;
require_once('../init.php');

class MMain extends \View {
	function get() {
		if ($_SESSION['valid'] == true) {
			$info = \Models\ISpeakers::get(\db::get(), $_SESSION['auth_id']);
			$this->smarty->assign('ispeaker', $info);
			$this->smarty->display('ispeaker/main.html');
		} else {
			header('location: ../ispeakers.php');
		}
	}
}
new MMain;
