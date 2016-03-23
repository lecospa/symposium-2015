<?php
namespace ISpeaker;
require_once('../init.php');

class ParallelSpeaker extends \Controllers\Controller {
	public function get() {
		$conn = new \Conn();
		$id = $_GET['id'];
		$session = \Models\Sessions::get($conn, $id);

		$organizers = array();
		$os = \Models\Sessions::get_properties($conn, $id, 'organizer');
		foreach($os as $o) {
			$organizers[] = \Models\People::get($conn, $o['value']);
		}

		$session['talks'] = \Models\Sessions::get_talks($conn, $session['id']);
		foreach ($session['talks'] as &$talk) {
			$talk['speaker'] = \Models\People::get($conn, $talk['person_id']);
		}

		// 將 location, date_time 合併成 slot
		$session['slots'] = array();
		$session['slots'][] = array('location' => $session['location_1'], 'date_time' => $session['date_time_1']);
		if (!empty($session['location_2'])) {
			$session['slots'][] = array('location' => $session['location_2'], 'date_time' => $session['date_time_2']);
		}

		$this->smarty->assign('session', $session);
		$this->smarty->assign('organizers', $organizers);
		$this->smarty->display('parallel_session.tpl');
	}
}
new ParallelSpeaker;
