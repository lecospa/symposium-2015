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

			$session['talks'] = \Models\Sessions::get_talks($conn, $session['id']);
			foreach ($session['talks'] as &$talk) {
				$talk['speaker'] = \Models\People::get($conn, $talk['person_id']);
			}

			$session['slots'] = array();
			$session['slots'][] = array('location' => $session['location_1'], 'date_time' => $session['date_time_1']);
			if (!empty($session['location_2'])) {
				$session['slots'][] = array('location' => $session['location_2'], 'date_time' => $session['date_time_2']);
			}
		}
		$this->smarty->assign('sessions', $sessions);
		$this->smarty->display('parallel_sessions.tpl');
	}
}
new Parallel;
