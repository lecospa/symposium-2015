<?php
require_once('../../../init.php');

class Img extends \Controllers\Controller {
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
			$handler->valid_ext = array('jpg', 'png', 'jpeg');
			$handler->dir = __DIR__ . '/../../uploads/';
			$handler->run();

			$person_id = $_GET['person_id'];

			\Models\People::update_img($conn, $person_id, $handler->filename);

			header('Location: ' . TOP . '/admin/person.php?token='.$token . '&id=' . $person_id . '&mode=edit');
		} catch (\RuntimeException $e) {
			echo $e->getMessage();
		}
	}
}

new Img;
