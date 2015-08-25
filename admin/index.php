<?php
namespace Admin;
require_once('../init.php');

class Index extends \View {
	public function get() {
		$token = $_GET['token'];
		$auth = \Models\Auth::get(\db::get(), $token);
		if ($auth['scope'] == 'sudo') {
			$this->smarty->assign('token', $token);
			$this->smarty->display('admin/index.html');
		} else {
			header('Location: ' . TOP);
		}
	}
}
new Index;
