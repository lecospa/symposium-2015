<?php
namespace API\Session;
require_once('../../../init.php');

class Title1 extends \Controllers\APIController {
	public function patch() {
		$this->check('sudo');
		$conn = new \Conn();
		$session_id = $_GET['session_id'];
		$location_1 = $_POST['location_1'];
		$stmt = $conn->prepare("UPDATE `sessions` SET `location_1`=? WHERE `id`=?");
		$stmt->execute(array($location_1, $session_id));
		$this->json(array('status' => 'success'));
	}
}
new Title1;
