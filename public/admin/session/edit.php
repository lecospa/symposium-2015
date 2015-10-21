<?php
namespace Admin;
require_once('../../init.php');

class Index extends \View {
	public function get() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$session_id = $_GET['session_id'];
			$session['id'] = $session_id;
			$session['title'] = \Models\Sessions::get_property($conn, $session['id'], 'title')['value'];
			$session['location'] = \Models\Sessions::get_property($conn, $session['id'], 'location')['value'];
			$session['date'] = \Models\Sessions::get_property($conn, $session['id'], 'date')['value'];
			$session['time'] = \Models\Sessions::get_property($conn, $session['id'], 'time')['value'];
			$session['organizers'] = \Models\Sessions::get_properties($conn, $session['id'], 'organizer');
			foreach ($session['organizers'] as &$organizer) {
				$organizer['content'] = \Models\People::get($conn, $organizer['value']);
			}
			$session['speakers'] = \Models\Sessions::get_properties($conn, $session['id'], 'speaker');
			foreach ($session['speakers'] as &$speaker) {
				$speaker['content'] = \Models\People::get($conn, $speaker['value']);
			}
			$people = \Models\People::all_by_type($conn, 'Parallel');
			$this->smarty->assign('session', $session);
			$this->smarty->assign('people', $people);
			$this->smarty->assign('token', $token);
			$this->smarty->display('admin/session/edit.html');
		} else {
			throw new \UnauthorizedException();
		}
	}
}
new Index;
