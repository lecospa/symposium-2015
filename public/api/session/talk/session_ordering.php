<?php
namespace API\Session;
require_once('../../../../init.php');

class SessionOrdering extends \Controllers\APIController {
	public function patch() {
		$this->check('sudo');
		$conn = new \Conn();
		$session_id = $_GET['session_id'];
		$talk_id = $_GET['talk_id'];
		$session_ordering = $_POST['session_ordering'];

		$stmt = $conn->prepare("UPDATE `talks` SET `session_ordering`=? WHERE `id`=?");
		$stmt->execute(array($session_ordering, $talk_id));

		$this->json(array('status' => 'success'));
	}
}
new SessionOrdering;
