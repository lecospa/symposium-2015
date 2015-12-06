<?php
require_once('../../../../init.php');

class Slide extends \Controllers\AdminController {
	public function get() {
		throw new \ForbiddenException();
	}
	public function patch() {
		$this->check('slide_patch');
		$conn = new \Conn();

	}
}

new Slide;
