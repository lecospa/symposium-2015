<?php
namespace Admin;
require_once('../../init.php');

class Index extends \View {
	public function get() {
		$token = $_GET['token'];
		$auth = \Models\Auth::get(\db::get(), $token);
		if ($auth['scope'] == 'sudo') {
			$conn = new \Conn();
			$session_id = $_GET['session_id'];
			$session['id'] = $session_id;
			$session['title'] = \Models\Sessions::get_property($conn, $session['id'], 'title');
			$session['organizers'] = \Models\Sessions::get_properties($conn, $session['id'], 'organizer');
			foreach ($session['organizers'] as &$organizer) {
				$organizer['content'] = \Models\People::get($conn, $organizer['value']);
			}
			$session['speakers'] = \Models\Sessions::get_properties($conn, $session['id'], 'speaker');
			foreach ($session['speakers'] as &$speaker) {
				$speaker['content'] = \Models\People::get($conn, $speaker['value']);
			}
			$this->smarty->assign('session', $session);
			$this->smarty->assign('token', $token);
			$this->smarty->display('admin/session/edit.html');
		} else {
			header('Location: ' . TOP);
		}
	}
}
new Index;
