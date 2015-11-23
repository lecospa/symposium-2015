<?php
namespace Person;
require_once('../../init.php');

class MMain extends \Controllers\Controller {
	public function get() {
		$token = $_GET['token'];
		header('Location: ../person.php?token=' . $token);
	}
}
new MMain;
