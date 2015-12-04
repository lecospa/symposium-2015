<?php
require_once('../init.php');
class Committees extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);

		$conn = new \Conn();
		$committees = array();

		$committees['IACCHAIR'] = \Models\Committees::get_people_by_type($conn, 'IACCHAIR');
		$committees['IAC']      = \Models\Committees::get_people_by_type($conn, 'IAC');
		$committees['LOCCHAIR'] = \Models\Committees::get_people_by_type($conn, 'LOCCHAIR');
		$committees['LOC']      = \Models\Committees::get_people_by_type($conn, 'LOC');

		$this->smarty->assign('committees', $committees);
		$this->smarty->display('committees.tpl');
	}
}
new Committees;
