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
		
		$speakers = \Models\Sessions::get_people($conn, $id);

		$this->smarty->assign('session', $session);
		$this->smarty->assign('organizers', $organizers);
		$this->smarty->assign('speakers', $speakers);
		$this->smarty->display('parallel_session.html');
	}
}
new ParallelSpeaker;
