<?php
namespace API\Session;
require_once('../../../init.php');

class Title1 extends \Controllers\APIController {
	public function patch() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$session_id = $_GET['session_id'];
			$location_1 = $_POST['location_1'];
			$stmt = $conn->prepare("UPDATE `sessions` SET `location_1`=? WHERE `id`=?");
			$stmt->execute(array($location_1, $session_id));
			$this->json(array('status' => 'success'));
		} else {
			throw new UnauthorizedException();
		}
	}
}
new Title1;