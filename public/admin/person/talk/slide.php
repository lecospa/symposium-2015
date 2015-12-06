<?php
require_once('../../../../init.php');

class Slide extends \Controllers\AdminController {
	public function get() {
		throw new \ForbiddenException();
	}
	public function patch() {
		$this->check('slide_patch');
		$conn = new \Conn();

		try {
			$handler = new \Controllers\UploadFiles;
			$handler->valid_ext = array('pdf', 'doc', 'docx', 'ppt', 'pptx', 'zip');
			$handler->dir = __DIR__ . '/../../../uploads/';
			$handler->run();

			$person_id = $_GET['person_id'];
			$talk_id = $_GET['talk_id'];

			$stmt = $conn->prepare("UPDATE `talks` SET `slide_file`=? WHERE `id`=? AND `person_id`=?");
			$stmt->execute(array($handler->filename, $talk_id, $person_id));

			header('Location: ' . TOP . '/admin/person.php?id=' . $person_id . '&mode=edit');
		} catch (\RuntimeException $e) {
			echo $e->getMessage();
		}
	}
	public function delete() {
		$this->check('slide_delete');
		$conn = new \Conn();


		$person_id = $_GET['person_id'];
		$talk_id = $_GET['talk_id'];

		$stmt = $conn->prepare("UPDATE `talks` SET `slide_file`= '' WHERE `id`=? AND `person_id`=?");
		$stmt->execute(array($talk_id, $person_id));

		header('Location: ' . TOP . '/admin/person.php?id=' . $person_id . '&mode=edit');
	}
}

new Slide;
