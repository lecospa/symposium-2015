<?php
require_once('init.php');
class Parallel extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);

		$conn = new \Conn();
		$sessions = \Models\Sessions::all($conn);
		foreach ($sessions as &$session) {
			$session['title'] = \Models\Sessions::get_property($conn, $session['id'], 'title')['value'];
			$session['location'] = \Models\Sessions::get_property($conn, $session['id'], 'location')['value'];
			$session['date'] = \Models\Sessions::get_property($conn, $session['id'], 'date')['value'];
			$session['time'] = \Models\Sessions::get_property($conn, $session['id'], 'time')['value'];

			$session['organizers'] = array();
			$os = \Models\Sessions::get_properties($conn, $session['id'], 'organizer');
			foreach($os as $o) {
				$session['organizers'][] = \Models\People::get($conn, $o['value']);
			}

			$session['speakers'] = array();
			$os = \Models\Sessions::get_properties($conn, $session['id'], 'speaker');
			foreach($os as $o) {
				$session['speakers'][] = \Models\People::get($conn, $o['value']);
			}
		}
		$this->smarty->assign('sessions', $sessions);
		$this->smarty->display('parallel_sessions.html');
	}
}
new Parallel;
