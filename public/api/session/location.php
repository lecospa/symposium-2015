<?php
namespace API\Session;
require_once('../../../init.php');

class Title extends \Controllers\APIController {
	public function patch() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$session_id = $_GET['session_id'];
			$location = $_POST['location'];
			$stmt = $conn->prepare("UPDATE `sessions` SET `location`=? WHERE `id`=?");
			$stmt->execute(array($location, $session_id));
			$this->json(array('status' => 'success'));
		} else {
			throw new UnauthorizedException();
		}
	}
}
new Title;
