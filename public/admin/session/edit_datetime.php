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
			$date = $_POST['date'];
			$time = $_POST['time'];
			\Models\Sessions::update_property($conn, $session_id, 'date', $date);
			\Models\Sessions::update_property($conn, $session_id, 'time', $time);
			header('Location: edit.php?token=' . $token . '&session_id=' . $session_id);
		} else {
			throw new UnauthorizedException();
		}
	}
}
new Index;