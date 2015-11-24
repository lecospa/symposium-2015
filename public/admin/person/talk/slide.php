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
			$valid_ext = array('pdf', 'doc', 'docx', 'ppt', 'pptx');

			if (!isset($_FILES['file']['error']) || is_array($_FILES['file']['error']) ) {
				throw new RuntimeException('Invalid parameters.');
			}
			if ($_FILES['file']['error'] != UPLOAD_ERR_OK) {
				throw new RuntimeException('Error');
			}
			$path_parts = pathinfo($_FILES['file']['name']);
			$ext = $path_parts['extension'];
			if (in_array(strtolower($ext), $valid_ext, true) === false) {
				throw new RuntimeException('Invalid file format.');
			}

			$filename = sprintf('%s.%s', sha1_file($_FILES['file']['tmp_name']), $ext);
			$fullfilename = __DIR__ . '/../../../uploads/' . $filename;

			if (!move_uploaded_file($_FILES['file']['tmp_name'], $fullfilename)) {
				throw new RuntimeException('Failed to move uploaded file.');
			}

			$person_id = $_GET['person_id'];
			$talk_id = $_GET['talk_id'];

			$stmt = $conn->prepare("UPDATE `talks` SET `slide_file`=? WHERE `id`=? AND `person_id`=?");
			$stmt->execute(array($filename, $talk_id, $person_id));

			header('Location: ' . TOP . '/admin/person.php?token='.$token . '&id=' . $person_id . '&mode=edit');
		} catch (RuntimeException $e) {
			echo $e->getMessage();
		}
	}
}

new Slide;
