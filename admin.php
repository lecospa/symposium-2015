<?php
require_once('init.php');

class Admin extends \View {
	public function get() {
		$token = $_GET['token'];
		$auth = \Models\Auth::get(\db::get(), $token);
		if ($auth['scope'] == 'sudo') {
			$ispeakers = \Models\ISpeakers::all_with_token(\db::get());
			$this->smarty->assign('ispeakers', $ispeakers);
			$this->smarty->display('admin.html');
		} else {
		}
	}
}
new Admin;
