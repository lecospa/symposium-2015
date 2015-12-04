<?php
require_once('../init.php');
class Plenary extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$conn = new \Conn();
		
		$plenary_sessions = \Models\Talks::all_with_session_plenary($conn);
		
		foreach ($plenary_sessions as &$plenary_session) {
			$plenary_session['person'] = \Models\People::get($plenary_session['person_id']);
		}

		$this->smarty->assign('plenary_sessions', $plenary_sessions);
		$this->smarty->display('plenary_sessions.tpl');
	}
}
new Plenary;
