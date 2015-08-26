<?php
namespace Admin;
require_once('../init.php');

class Index extends \View {
	public function get() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$iac_chairs = \Models\People::all_with_token_by_type($conn, 'IACCHAIR');
			$iacs = \Models\People::all_with_token_by_type($conn, 'IAC');
			$loc_chairs = \Models\People::all_with_token_by_type($conn, 'LOCCHAIR');
			$locs = \Models\People::all_with_token_by_type($conn, 'LOC');

			$this->smarty->assign('iac_chairs', $iac_chairs);
			$this->smarty->assign('iacs', $iacs);
			$this->smarty->assign('loc_chairs', $loc_chairs);
			$this->smarty->assign('locs', $locs);
			$this->smarty->assign('token', $token);
			$this->smarty->display('admin/committees.html');
		} else {
			throw new \UnauthorizedException();
		}
	}
}
new Index;
