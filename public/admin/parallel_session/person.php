<?php
namespace Admin;
require_once('../../../init.php');

class Index extends \Controllers\Controller {
	public function post() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$session_id = $_GET['session_id'];
			$person_id = $_POST['person_id'];
			\Models\People::update_session_id($conn, $person_id, $session_id);
			header('Location: ../parallel_session.php?mode=edit&session_id='. $session_id . '&token=' . $token);
		} else {
			throw new \UnauthorizedException();
		}
	}
	public function delete() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$session_id = $_GET['session_id'];
			$person_id = $_GET['person_id'];
			\Models\People::update_session_id($conn, $person_id, '0');
			header('Location: ../parallel_session.php?mode=edit&session_id='. $session_id . '&token=' . $token);
		} else {
			throw new \UnauthorizedException();
		}
	}
}
new Index;
