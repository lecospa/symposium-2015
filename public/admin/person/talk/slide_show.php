<?php
require_once('../../../../init.php');

class SlideShow extends \Controllers\AdminController {
	public function patch() {
		$this->check('slide_patch');
		$conn = new \Conn();
		$person_id = $_GET['person_id'];
		$slide_file_show = $_POST['slide_file_show'];
		$stmt = $conn->prepare("UPDATE `talks` SET `slide_file_show`=? WHERE `id`=?");
		$stmt->execute(array($slide_file_show, $person_id));
	}
}

new SlideShow;
