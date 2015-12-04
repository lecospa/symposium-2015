<?php
require_once('../../init.php');

class Committee extends \Controllers\Controller {
	public function post() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] != 'sudo') {
			throw new \UnauthorizedException();
		}
		$type = $_POST['type'];
		$person_id = $_POST['person_id'];

		try {
			\Models\Committees::insert_person($conn, $type, $person_id);
		} catch (\PDOException $e) {
			// do nothing
		}

		header('Location: ' . TOP . '/admin/committees.php?token='.$token);
	}
	public function delete() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] != 'sudo') {
			throw new \UnauthorizedException();
		}
		$type = $_GET['type'];
		$person_id = $_GET['person_id'];

		$stmt = $conn->prepare("DELETE FROM `committee_person` WHERE `type`=? AND `person_id`=?");
		$stmt->execute(array($type, $person_id));

		header('Location: ' . TOP . '/admin/committees.php?token='.$token);
	}
}

new Committee;
