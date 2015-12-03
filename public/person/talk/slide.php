<?php
require_once('../../../init.php');

class Slide extends \Controllers\Controller {
	public function get() {
		throw new \ForbiddenException();
	}
	public function patch() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		
		if ($auth['scope'] != 'people') {
			throw new \UnauthorizedException();
		}

		try {
			$handler = new \Controllers\UploadFiles;
			$handler->valid_ext = array('pdf', 'doc', 'docx', 'ppt', 'pptx');
			$handler->dir = __DIR__ . '/../../uploads/';
			$handler->run();

			$person_id = $auth['id'];
			$talk_id = $_GET['talk_id'];

			$stmt = $conn->prepare("UPDATE `talks` SET `slide_file`=? WHERE `id`=? AND `person_id`=?");
			$stmt->execute(array($handler->filename, $talk_id, $person_id));

			header('Location: ' . TOP . '/person.php?token='.$token . '&mode=edit');
		} catch (\RuntimeException $e) {
			echo $e->getMessage();
		}
	}
}

new Slide;
