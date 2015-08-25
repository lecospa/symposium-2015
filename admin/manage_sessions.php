<?php
namespace Admin;
require_once('../init.php');

class Index extends \View {
	public function get() {
		$token = $_GET['token'];
		$auth = \Models\Auth::get(\db::get(), $token);
		if ($auth['scope'] == 'sudo') {
			$conn = new \Conn();
			$sessions = \Models\Sessions::all($conn);

			foreach ($sessions as &$session) {
				$session['title'] = \Models\Sessions::get_title($conn, $session['id'])['value'];
			}
			$this->smarty->assign('sessions', $sessions);
			$this->smarty->assign('token', $token);
			$this->smarty->display('admin/manage_sessions.html');
		} else {
			header('Location: ' . TOP);
		}
	}
}
new Index;
