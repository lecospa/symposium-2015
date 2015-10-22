<?php
namespace Admin;
require_once('../../../init.php');

class Index extends \Controllers\Controller {
	public function post() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$session_id = $_POST['session_id'];
			$value = $_POST['value'];
			\Models\Sessions::insert_property($conn, $session_id, 'speaker', $value);
			\Models\People::update_session_id($conn, $value, $session_id);
			header('Location: edit.php?token=' . $token . '&session_id=' . $session_id);
		} else {
			throw new \UnauthorizedException();
		}
	}
}
new Index;
