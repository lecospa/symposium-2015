<?php
namespace Admin;
require_once('../../init.php');

class Committees extends \Controllers\AdminController {
	public function get() {
		$this->check('committees_get');
		$conn = new \Conn();

		$committees = array();
		$committees['IACCHAIR'] = \Models\Committees::get_people_by_id($conn, 1);
		$committees['IAC']      = \Models\Committees::get_people_by_id($conn, 2);
		$committees['LOCCHAIR'] = \Models\Committees::get_people_by_id($conn, 3);
		$committees['LOC']      = \Models\Committees::get_people_by_id($conn, 4);

		$query = \Models\Query::prepare($conn, "SELECT `id`, `first_name`, `last_name` FROM `people` ORDER BY `last_name` ASC, `last_name` ASC");
		$people = $query->fetchAll();

		$this->smarty->assign('committees', $committees);
		$this->smarty->assign('people', $people);
		$this->smarty->display('admin/committees.html');
	}
}
new Committees;
