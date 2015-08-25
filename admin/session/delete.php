<?php
namespace Admin;
require_once('../../init.php');

class Index extends \View {
	public function post() {
		$token = $_GET['token'];
		$auth = \Models\Auth::get(\db::get(), $token);
		if ($auth['scope'] == 'sudo') {
			$conn = new \Conn();
			$id = $_POST['id'];
			$session_id = $_POST['session_id'];
			\Models\Sessions::delete_property_by_id($conn, $id);
			header('Location: edit.php?token=' . $token . '&session_id=' . $session_id);
		} else {
			header('Location: ' . TOP);
		}
	}
}
new Index;
