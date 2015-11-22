<?php
require_once('../init.php');
class Parallel extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);

		$conn = new \Conn();
		$sessions = \Models\Sessions::all($conn);
		foreach ($sessions as &$session) {
			$session['organizers'] = array();
			$os = \Models\Sessions::get_properties($conn, $session['id'], 'organizer');
			foreach($os as $o) {
				$session['organizers'][] = \Models\People::get($conn, $o['value']);
			}
			$session['speakers'] = \Models\Sessions::get_people($conn, $session['id']);
		}
		$this->smarty->assign('sessions', $sessions);
		$this->smarty->display('parallel_sessions.html');
	}
}
new Parallel;
