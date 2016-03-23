<?php
require_once('../init.php');
class Program extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$conn = new \Conn();

		$stmt = $conn->prepare("SELECT `id`, `first_name`, `last_name` FROM `people` ORDER BY `id`");
		$stmt->execute();
		$people = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		$p = array();
		foreach ($people as $person) {
			$p[$person['id']] = $person;
		}
		$this->smarty->assign('people', $p);
		
		$sessions = \Models\Sessions::all($conn);
		$s = array();
		foreach ($sessions as $session) {
			$s[$session['id']] = $session;
		}
		$this->smarty->assign('session', $s);

		$this->smarty->display('program.tpl');
	}
}
new Program;
