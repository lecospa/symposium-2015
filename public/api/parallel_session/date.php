<?php
namespace API\Session;
require_once('../../../init.php');

class DateController extends \Controllers\APIController {
	public function patch() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$session_id = $_GET['session_id'];
			$date = $_POST['date'];
			$stmt = $conn->prepare("UPDATE `sessions` SET `date`=? WHERE `id`=?");
			$stmt->execute(array($date, $session_id));
			$this->json(array('status' => 'success'));
		} else {
			throw new UnauthorizedException();
		}
	}
}
new DateController;
