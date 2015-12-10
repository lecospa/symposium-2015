<?php
require_once('../../../init.php');

class Talk extends \Controllers\AdminController {
	/*
	 * 更新某一場 talk
	 * PATCH /admin/person/talk.php?person_id={}&talk_id={}
	 */
	public function patch() {
		// 權限驗證
		$this->check('sudo');

		/*
		 * 取得 person_id, talk_id
		 */
		$person_id = $_GET['person_id'];
		$talk_id   = $_GET['talk_id'];

		$conn = new \Conn();
		$logger = new \Models\Logging($conn, $_SERVER);

		/*
		 * 需要更新的欄位名稱，透過$_POST
		 */
		$title            = $_POST['title'];
		$abstract         = $_POST['abstract'];
		$address_datetime = $_POST['address_datetime'];
		$location         = $_POST['location'];
		$talk_time        = $_POST['talk_time'];
		$session          = $_POST['session'];
		$session_id       = $_POST['session_id'];
		
		/*
		 * 資料庫更新
		 */
		$stmt = $conn->prepare("UPDATE `talks` SET `title`=?, `abstract`=?, `address_datetime`=?, `location`=?, `talk_time`=?, `session`=?, `session_id`=? WHERE `id`=?");
		$stmt->execute(array($title, $abstract, $address_datetime, $location, $talk_time, $session, $session_id, $talk_id));
		
		// 紀錄事件發生
		$logger->info('talk.update', json_encode(array('person_id' => $person_id, 'talk_id' => $talk_id, 'operator' => 'sudo')));
		
		// 返回至原本編輯的頁面
		header('Location: ../person.php?id=' . $person_id . '&mode=edit');
	}
	public function delete() {
		$this->check('person_talk_delete');

		$person_id = $_GET['person_id'];
		$talk_id = $_GET['talk_id'];
		$conn = new \Conn();
		$logger = new \Models\Logging($conn, $_SERVER);
		$stmt = $conn->prepare("DELETE FROM `talks` WHERE `id`=?");
		$stmt->execute(array($talk_id));
		$logger->info('talk.delete', json_encode(array('person_id' => $person_id, 'talk_id' => $talk_id, 'operator' => 'sudo')));
		header('Location: ../person.php?id=' . $person_id . '&mode=edit');
	}
}
new Talk;
