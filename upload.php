<?php
if ($_POST['submit'] == 'Submit') {
	try {
		if (!isset($_FILES['testfile']['error']) || is_array($_FILES['testfile']['error']) ) {
			throw new RuntimeException('Invalid parameters.');
		}
		if ($_FILES['testfile']['error'] != UPLOAD_ERR_OK) {
			throw new RuntimeException('Error');
		}
		$finfo = new finfo(FILEINFO_MIME_TYPE);
		if (false === $ext = array_search(
			$finfo->file($_FILES['testfile']['tmp_name']),
			array(
				'jpg' => 'image/jpeg',
				'doc' => 'application/msword'
			),
			true
		)) {
			throw new RuntimeException('Invalid file format.');
		}

		$filename = sprintf('./uploads/%s.%s', sha1_file($_FILES['testfile']['tmp_name']), $ext);

		if (!move_uploaded_file($_FILES['testfile']['tmp_name'], $filename)) {
			throw new RuntimeException('Failed to move uploaded file.');
		}
		
		echo 'Successfully' . $filename;
	} catch (RuntimeException $e) {
		echo $e->getMessage();
		print_r($_FILES);
	}
} else {
	require_once('libs/Smarty.class.php');
	$smarty = new Smarty;

	$smarty->caching = true;
	$smarty->display('upload.html');
}
