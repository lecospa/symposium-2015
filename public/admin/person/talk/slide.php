<?php
require_once('../../../../init.php');

class Slide extends \Controllers\Controller {
	public function get() {
		throw new \ForbiddenException();
	}
	public function patch() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		
		if ($auth['scope'] != 'sudo') {
			throw new \UnauthorizedException();
		}

		try {
			$handler = new \Controllers\UploadFiles;
			$handler->valid_ext = array('pdf', 'doc', 'docx', 'ppt', 'pptx');
			$handler->dir = __DIR__ . '/../../../uploads/';
			$handler->run();

			$person_id = $_GET['person_id'];
			$talk_id = $_GET['talk_id'];

			$stmt = $conn->prepare("UPDATE `talks` SET `slide_file`=? WHERE `id`=? AND `person_id`=?");
			$stmt->execute(array($handler->filename, $talk_id, $person_id));

			header('Location: ' . TOP . '/admin/person.php?token='.$token . '&id=' . $person_id . '&mode=edit');
		} catch (RuntimeException $e) {
			echo $e->getMessage();
		}
	}
	public function delete() {
		//取得權限
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		
		if ($auth['scope'] == 'sudo') {
			
			$person_id = $_GET['person_id'];
			$talk_id = $_GET['talk_id'];
			
			$stmt = $conn->prepare("UPDATE `talks` SET `slide_file`= '' WHERE `id`=? AND `person_id`=?");
			$stmt->execute(array($talk_id, $person_id));

			// ???
			$logger->info('talk.slide_file.delete', json_encode(array('id' => $talk_id, 'operator' => 'sudo')));
			header('Location: ' . TOP . '/admin/person.php?token='.$token . '&id=' . $person_id . '&mode=edit');
		} else {
			throw new \UnauthorizedException();
		}
	}
}

new Slide;
