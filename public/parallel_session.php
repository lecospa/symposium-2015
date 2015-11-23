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

		$this->smarty->assign('session', $session);
		$this->smarty->assign('organizers', $organizers);
		$this->smarty->display('parallel_session.tpl');
	}
}
new ParallelSpeaker;
