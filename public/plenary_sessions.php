<?php
require_once('../init.php');
class Plenary extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$conn = new \Conn();
		$stmt = $conn->prepare("SELECT `talks`.* FROM `talks` LEFT JOIN `people` ON `talks`.`person_id` = `people`.`id` WHERE `talks`.`session`='Plenary' ORDER BY `people`.`last_name`, `people`.`first_name`");
		$stmt->execute();
		$plenary_sessions = $stmt->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($plenary_sessions as &$plenary_session) {
			$plenary_session['person'] = \Models\People::get($conn, $plenary_session['person_id']);
		}

		$this->smarty->assign('plenary_sessions', $plenary_sessions);
		$this->smarty->display('plenary_sessions.tpl');
	}
}
new Plenary;
