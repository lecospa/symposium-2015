<?php
require_once('../init.php');
class Committees extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);

		$conn = new \Conn();
		$committees = array();

		$stmt = $conn->prepare("SELECT `people`.* FROM `committee_person` LEFT JOIN `people` ON `committee_person`.`person_id` = `people`.`id` WHERE `committee_person`.`type`=? ORDER BY `people`.`last_name` ASC, `people`.`first_name`");

		$stmt->execute(array('IACCHAIR'));
		$committees['IACCHAIR'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

		$stmt->execute(array('IAC'));
		$committees['IAC'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		
		$stmt->execute(array('LOCCHAIR'));
		$committees['LOCCHAIR'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

		$stmt->execute(array('LOC'));
		$committees['LOC'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

		$this->smarty->assign('committees', $committees);
		$this->smarty->display('committees.tpl');
	}
}
new Committees;
