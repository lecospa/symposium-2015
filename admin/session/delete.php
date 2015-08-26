<?php
namespace Admin\Session;
require_once('../../init.php');

class Delete extends \View {
	public function post() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$id = $_POST['id'];
			$session_id = $_POST['session_id'];
			\Models\Sessions::delete_property_by_id($conn, $id);
			header('Location: edit.php?token=' . $token . '&session_id=' . $session_id);
		} else {
			throw new \UnauthorizedException();
		}
	}
}
new Delete;
