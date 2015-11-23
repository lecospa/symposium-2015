<?php
require_once('../init.php');
class Plenary extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$conn = new \Conn();
		$stmt = $conn->prepare("SELECT `people`.* FROM `talks` LEFT JOIN `people` ON `talks`.`person_id` = `people`.`id` WHERE `talks`.`session`='Plenary' ORDER BY `people`.`last_name`, `people`.`first_name`");
		$stmt->execute();
		$plenary_speakers = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		$this->smarty->assign('plenary_speakers', $plenary_speakers);
		$this->smarty->display('plenary_speakers.html');
	}
}
new Plenary;
