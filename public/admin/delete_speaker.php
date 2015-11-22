<?php
namespace Admin\Session;
require_once('../../../init.php');

class Delete extends \Controllers\Controller {
	public function post() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$person_id = $_POST['person_id'];
			$session_id = $_POST['session_id'];
			\Models\People::update_session_id($conn, $person_id, '0');

			header('Location: edit.php?token=' . $token . '&session_id=' . $session_id);
		} else {
			throw new \UnauthorizedException();
		}
	}
}
new Delete;
