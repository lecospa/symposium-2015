<?php
namespace API\Session;
require_once('../../../init.php');

class DateTimeController extends \Controllers\APIController {
	public function patch() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$session_id = $_GET['session_id'];
			$date_time = $_POST['date_time'];
			$stmt = $conn->prepare("UPDATE `sessions` SET `date_time`=? WHERE `id`=?");
			$stmt->execute(array($date_time, $session_id));
			$this->json(array('status' => 'success'));
		} else {
			throw new UnauthorizedException();
		}
	}
}
new DateTimeController;
