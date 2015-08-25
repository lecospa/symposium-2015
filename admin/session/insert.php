<?php
namespace Admin;
require_once('../../init.php');

class Index extends \View {
	public function post() {
		$token = $_GET['token'];
		$auth = \Models\Auth::get(\db::get(), $token);
		if ($auth['scope'] == 'sudo') {
			$conn = new \Conn();
			$session_id = $_POST['session_id'];
			$name = $_POST['name'];
			$value = $_POST['value'];
			\Models\Sessions::insert_property($conn, $session_id, $name, $value);
			header('Location: edit.php?token=' . $token . '&session_id=' . $session_id);
		} else {
			header('Location: ' . TOP);
		}
	}
}
new Index;
