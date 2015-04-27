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
			if (!isset($_FILES['slidefile']['error']) || is_array($_FILES['slidefile']['error']) ) {
				throw new RuntimeException('Invalid parameters.');
			}
			if ($_FILES['slidefile']['error'] != UPLOAD_ERR_OK) {
				throw new RuntimeException('Error');
			}
			$path_parts = pathinfo($_FILES['slidefile']['name']);
			$ext = $path_parts['extension'];
			if (in_array($ext, array('jpg', 'pdf'), true) === false) {
				throw new RuntimeException('Invalid file format.');
			}

			$filename = sprintf('%s.%s', sha1_file($_FILES['slidefile']['tmp_name']), $ext);
			$fullfilename = ROOT . '/uploads/' . $filename;

			if (!move_uploaded_file($_FILES['slidefile']['tmp_name'], $fullfilename)) {
				throw new RuntimeException('Failed to move uploaded file.');
			}
			\Models\ISpeakers::update_slide_file(get_connection(), $auth['id'], $filename);
			header('location: main.php?token='.$token);
		} catch (RuntimeException $e) {
			echo $e->getMessage();
		}
	}
}

new Upload;
