<?php
require_once('init.php');
class Parallel extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);

		$conn = new \Conn();
		$sessions = \Models\Sessions::all($conn);
		foreach ($sessions as &$session) {
			$session['title'] = \Models\Sessions::get_property($conn, $session['id'], 'title');
		}

		$this->smarty->assign('sessions', $sessions);
		$this->smarty->display('parallel_sessions.html');
	}
}
new Parallel;
