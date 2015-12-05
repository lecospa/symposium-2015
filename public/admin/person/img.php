<?php
require_once('../../../init.php');

class Img extends \Controllers\AdminController {
	public function get() {
		throw new \ForbiddenException();
	}
	public function patch() {
		$this->check('sudo');
		$conn = new \Conn();
		
		try {
			$handler = new \Controllers\UploadFiles;
			$handler->valid_ext = array('jpg', 'png', 'jpeg');
			$handler->dir = __DIR__ . '/../../uploads/';
			$handler->run();

			$person_id = $_GET['person_id'];

			\Models\People::update_img($conn, $person_id, $handler->filename);

			header('Location: ' . TOP . '/admin/person.php?id=' . $person_id . '&mode=edit');
		} catch (\RuntimeException $e) {
			echo $e->getMessage();
		}
	}
}

new Img;
