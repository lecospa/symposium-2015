<?php
namespace API\Session;
require_once('../../../init.php');

class OrganizerController extends \Controllers\APIController {
	public function delete() {
		$this->check('sudo');
		$conn = new \Conn();
		$id = $_GET['id'];
		$session_id = $_GET['session_id'];
		\Models\Sessions::delete_property_by_id($conn, $id);
		$this->json(array('status' => 'success'));
	}
}
new OrganizerController;
