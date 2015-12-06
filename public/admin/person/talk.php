<?php
require_once('../../../init.php');

class Talk extends \Controllers\AdminController {
	public function patch() {
		$this->check('sudo');

		$person_id = $_GET['person_id'];
		$talk_id = $_GET['talk_id'];

		$conn = new \Conn();
		$logger = new \Models\Logging($conn, $_SERVER);

		$title = $_POST['title'];
		$abstract = $_POST['abstract'];
		$address_datetime = $_POST['address_datetime'];
		$location = $_POST['location'];
		$talk_time = $_POST['talk_time'];
		$session = $_POST['session'];
		$session_id = $_POST['session_id'];

		$stmt = $conn->prepare("UPDATE `talks` SET `title`=?, `abstract`=?, `address_datetime`=?, `location`=?, `talk_time`=?, `session`=?, `session_id`=? WHERE `id`=?");
		$stmt->execute(array($title, $abstract, $address_datetime, $location, $talk_time, $session, $session_id, $talk_id));
		$logger->info('talk.update', json_encode(array('person_id' => $person_id, 'talk_id' => $talk_id, 'operator' => 'sudo')));

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
