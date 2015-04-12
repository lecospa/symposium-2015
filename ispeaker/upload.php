<?php
if ($_POST['submit'] == 'submit') {
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

		$filename = sprintf('../uploads/%s.%s', sha1_file($_FILES['slidefile']['tmp_name']), $ext);

		if (!move_uploaded_file($_FILES['slidefile']['tmp_name'], $filename)) {
			throw new RuntimeException('Failed to move uploaded file.');
		}
		header('location: main.php');
	} catch (RuntimeException $e) {
		echo $e->getMessage();
	}
}
