<?php
namespace Admin;
require_once('../../init.php');

class Index extends \Controllers\Controller {
	public function get() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] != 'sudo') {
			throw new \UnauthorizedException();
		}

		$committees = array();
		$committees['IACCHAIR'] = \Models\Committees::get_people_by_type($conn, 'IACCHAIR');
		$committees['IAC']      = \Models\Committees::get_people_by_type($conn, 'IAC');
		$committees['LOCCHAIR'] = \Models\Committees::get_people_by_type($conn, 'LOCCHAIR');
		$committees['LOC']      = \Models\Committees::get_people_by_type($conn, 'LOC');

		$query = \Models\Query::prepare($conn, "SELECT `id`, `first_name`, `last_name` FROM `people` ORDER BY `last_name` ASC, `last_name` ASC");
		$people = $query->fetchAll();

		$this->smarty->assign('committees', $committees);
		$this->smarty->assign('people', $people);
		$this->smarty->assign('token', $token);
		$this->smarty->display('admin/committees.html');
	}
}
new Index;
