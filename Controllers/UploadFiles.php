<?php
namespace Controllers;
/*
 * File upload handler, accept param `file` in form
 */
class UploadFiles {
	// Valid file extensions (in array)
	public $valid_ext = array();
	// upload target with trailing slash
	public $dir;

	public $filename;
	public $fullfilename;

	public function run() {
		// ensure the param is `file`
		if (!isset($_FILES['file']['error']) || is_array($_FILES['file']['error']) ) {
			throw new \RuntimeException('Invalid parameters.');
		}
		// ensure upload success
		if ($_FILES['file']['error'] != UPLOAD_ERR_OK) {
			throw new \RuntimeException('Error');
		}

		$path_parts = pathinfo($_FILES['file']['name']);
		$ext = $path_parts['extension'];
		if (in_array(strtolower($ext), $this->valid_ext, true) === false) {
			throw new \RuntimeException('Invalid file format.');
		}

		$this->filename = sprintf('%s.%s', sha1_file($_FILES['file']['tmp_name']), $ext);
		$this->fullfilename = $this->dir . $this->filename;

		if (!move_uploaded_file($_FILES['file']['tmp_name'], $this->fullfilename)) {
			throw new \RuntimeException('Failed to move uploaded file.');
		}
	}
}
