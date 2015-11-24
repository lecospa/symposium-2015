<?php
require_once('../../../init.php');

class Talk extends \Controllers\Controller {
	public function patch() {
		$token = $_GET['token'];
		$person_id = $_GET['person_id'];
		$talk_id = $_GET['talk_id'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$title = $_POST['title'];
			$abstract = $_POST['abstract'];
			$address_datetime = $_POST['address_datetime'];
			$talk_time = $_POST['talk_time'];
			$session = $_POST['session'];
			$session_id = $_POST['session_id'];

			$stmt = $conn->prepare("UPDATE `talks` SET `title`=?, `abstract`=?, `address_datetime`=?, `talk_time`=?, `session`=?, `session_id`=? WHERE `id`=?");
			$stmt->execute(array($title, $abstract, $address_datetime, $talk_time, $session, $session_id, $talk_id));

			header('Location: ../person.php?token=' . $token . '&id=' . $person_id . '&mode=edit');
		} else {
			throw new \UnauthorizedException();
		}
	}
	public function delete() {
		$token = $_GET['token'];
		$person_id = $_GET['person_id'];
		$talk_id = $_GET['talk_id'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$stmt = $conn->prepare("DELETE FROM `talks` WHERE `id`=?");
			$stmt->execute(array($talk_id));
			header('Location: ../person.php?token=' . $token . '&id=' . $person_id . '&mode=edit');
		} else {
			throw new \UnauthorizedException();
		}
		
	}
}
new Talk;
