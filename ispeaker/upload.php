<?php
require_once('../init.php');

class Upload extends \View {
	public function get() {
		echo 'There are something wrong that you can get here';
	}
	public function post() {
		$token = $_POST['token'];
		$auth = \Models\Auth::get(\db::get(), $token);
		
		if ($auth['scope'] != 'ispeakers') {
			header('location: ispeakers.php');
			exit();
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
				\Models\ISpeakers::update_slide_file(get_connection(), $auth['id'], $filename);
			} else if ($target == 'img') {
				\Models\ISpeakers::update_img(get_connection(), $auth['id'], $filename);
			}


			header('location: main.php?token='.$token);
		} catch (RuntimeException $e) {
			echo $e->getMessage();
		}
	}
}

new Upload;
