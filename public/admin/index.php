<?php
require_once('../../init.php');

class AdminIndex extends \Controllers\Controller {
	public function get() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$this->smarty->assign('token', $token);
			$this->smarty->display('admin/index.html');
		} else {
			throw new \UnauthorizedException();
		}
	}
}
new AdminIndex;
