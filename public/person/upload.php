<?php
require_once('../init.php');

class Upload extends \View {
	public function get() {
		throw new \ForbiddenException();
	}
	public function post() {
		$token = $_POST['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		
		if ($auth['scope'] != 'people') {
			throw new \UnauthorizedException();
		}

		try {
			$target = $_GET['target'];
			if ($target == 'slide') {
				$valid_ext = array('pdf', 'doc', 'docx', 'ppt', 'pptx');
			} else if ($target == 'img') {
				$valid_ext = array('jpg', 'png', 'jpeg');
			} else {
				throw new RuntimeException('Invalid target');
			}

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
			$fullfilename = ROOT . '/uploads/' . $filename;

			if (!move_uploaded_file($_FILES['file']['tmp_name'], $fullfilename)) {
				throw new RuntimeException('Failed to move uploaded file.');
			}

			if ($target == 'slide') {
				\Models\People::update_slide_file($conn, $auth['id'], $filename);
			} else if ($target == 'img') {
				\Models\People::update_img($conn, $auth['id'], $filename);
			}


			header('location: main.php?token='.$token);
		} catch (RuntimeException $e) {
			echo $e->getMessage();
		}
	}
}

new Upload;
