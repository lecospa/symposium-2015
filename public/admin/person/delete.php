<?php
namespace Admin;
require_once('../../../init.php');

class PersonDelete extends \Controllers\Controller {
	public function post() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$id = $_POST['id'];
			if (empty($id)) {
				throw new ForbiddenException();
				return;
			}
			$speaker_id = \Models\People::delete($conn, $id);
			header('Location: ' . TOP . '/admin/people.php?token='.$token);
		} else {
			throw new UnauthorizedException();
		}
	}
}


new PersonDelete;
