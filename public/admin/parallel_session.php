<?php
namespace Admin;
require_once('../../init.php');

class ParallelSession extends \Controllers\Controller {
	public function get() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$session_id = $_GET['session_id'];
			$session = \Models\Sessions::get($conn, $session_id);
			$session['organizers'] = \Models\Sessions::get_properties($conn, $session['id'], 'organizer');
			foreach ($session['organizers'] as &$organizer) {
				$organizer['content'] = \Models\People::get($conn, $organizer['value']);
			}
			$session['speakers'] = \Models\Sessions::get_people($conn, $session['id']);
			$people = \Models\People::all_by_type($conn, 'Parallel');
			$this->smarty->assign('session', $session);
			$this->smarty->assign('people', $people);
			$this->smarty->assign('token', $token);
			$this->smarty->display('admin/parallel_session.edit.tpl');
		} else {
			throw new \UnauthorizedException();
		}
	}
}
new ParallelSession;
