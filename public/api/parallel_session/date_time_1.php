<?php
namespace API\Session;
require_once('../../../init.php');

class DateTime1Controller extends \Controllers\APIController {
	public function patch() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$session_id = $_GET['session_id'];
			$date_time_1 = $_POST['date_time_1'];
			//準備更新
			$stmt = $conn->prepare("UPDATE `sessions` SET `date_time_1`=? WHERE `id`=?");
			
			//執行
			$stmt->execute(array($date_time_1, $session_id));
			$this->json(array('status' => 'success'));
		} else {
			throw new UnauthorizedException();
		}
	}
}
new DateTime1Controller;
