<?php
namespace API\Session;
require_once('../../../init.php');

class OrganizerController extends \Controllers\APIController {
	public function delete() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$id = $_POST['id'];
			$session_id = $_POST['session_id'];
			\Models\Sessions::delete_property_by_id($conn, $id);
			$this->json(array('status' => 'success'));
		} else {
			throw new \UnauthorizedException();
		}
	}
	public function post() {
		$this->json("hello");
	}
}
new OrganizerController;
