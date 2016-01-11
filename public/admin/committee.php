<?php
require_once('../../init.php');

class Committee extends \Controllers\AdminController {
	public function post() {
		$this->check('committee_post');
		$conn = new \Conn();
		$committee_id = $_POST['committee_id'];
		$person_id = $_POST['person_id'];

		try {
			\Models\Committees::insert_person($conn, $committee_id, $person_id);
		} catch (\PDOException $e) {
			// do nothing
		}

		header('Location: ' . TOP . '/admin/committees.php');
	}
	public function delete() {
		$this->check('committee_delete');
		$conn = new \Conn();
		$committee_id = $_GET['committee_id'];
		$person_id = $_GET['person_id'];

		$stmt = $conn->prepare("DELETE FROM `committee_person` WHERE `committee_id`=? AND `person_id`=?");
		$stmt->execute(array($committee_id, $person_id));

		header('Location: ' . TOP . '/admin/committees.php');
	}
}

new Committee;
