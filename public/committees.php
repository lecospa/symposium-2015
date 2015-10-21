<?php
require_once('init.php');
class Committees extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);

		$conn = new \Conn();
		$iac_chairs = \Models\People::all_by_type($conn, 'IACCHAIR');
		$iacs = \Models\People::all_by_type($conn, 'IAC');
		$loc_chairs = \Models\People::all_by_type($conn, 'LOCCHAIR');
		$locs = \Models\People::all_by_type($conn, 'LOC');
		$this->smarty->assign('iac_chairs', $iac_chairs);
		$this->smarty->assign('iacs', $iacs);
		$this->smarty->assign('loc_chairs', $loc_chairs);
		$this->smarty->assign('locs', $locs);

		$this->smarty->display('committees.html');
	}
}
new Committees;
