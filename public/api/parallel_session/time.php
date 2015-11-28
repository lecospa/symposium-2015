<?php
namespace API\Session;
require_once('../../../init.php');

class TimeController extends \Controllers\APIController {
	public function patch() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$session_id = $_GET['session_id'];
			$time = $_POST['time'];
			$stmt = $conn->prepare("UPDATE `sessions` SET `time`=? WHERE `id`=?");
			$stmt->execute(array($time, $session_id));
			$this->json(array('status' => 'success'));
		} else {
			throw new UnauthorizedException();
		}
	}
}
new TimeController;
