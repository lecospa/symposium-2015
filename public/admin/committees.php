<?php
namespace Admin;
require_once('../../init.php');

class Index extends \Controllers\Controller {
	public function get() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$committees = array();

			$stmt = $conn->prepare("SELECT `people`.* FROM `committee_person` LEFT JOIN `people` ON `committee_person`.`person_id` = `people`.`id` WHERE `committee_person`.`type`=? ORDER BY `people`.`last_name` ASC, `people`.`first_name` ASC");

			$stmt->execute(array('IACCHAIR'));
			$committees['IACCHAIR'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

			$stmt->execute(array('IAC'));
			$committees['IAC'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			
			$stmt->execute(array('LOCCHAIR'));
			$committees['LOCCHAIR'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

			$stmt->execute(array('LOC'));
			$committees['LOC'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

			$stmt = $conn->prepare("SELECT `id`, `first_name`, `last_name` FROM `people` ORDER BY `last_name` ASC, `last_name` ASC");
			$stmt->execute();
			$people = $stmt->fetchAll(\PDO::FETCH_ASSOC);

			$this->smarty->assign('committees', $committees);
			$this->smarty->assign('people', $people);
			$this->smarty->assign('token', $token);
			$this->smarty->display('admin/committees.html');
		} else {
			throw new \UnauthorizedException();
		}
	}
}
new Index;
