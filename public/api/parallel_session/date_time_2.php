<?php
namespace API\Session;
require_once('../../../init.php');

class DateTime2Controller extends \Controllers\APIController {
	public function patch() {
		$this->check('sudo');
		$conn = new \Conn();
		$session_id = $_GET['session_id'];
		$date_time_2 = $_POST['date_time_2'];
		//準備更新
		$stmt = $conn->prepare("UPDATE `sessions` SET `date_time_2`=? WHERE `id`=?");

		//執行
		$stmt->execute(array($date_time_2, $session_id));
		$this->json(array('status' => 'success'));
	}
}
new DateTime2Controller;
