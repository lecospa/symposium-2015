<?php
require_once('../../init.php');

class Logout extends \Controllers\AdminController {
	public $protected = false;
	public function get() {
		unset($_SESSION['scopes']);

		$redirect = $_GET['redirect'];
		if ($redirect == '') {
			$redirect = '/admin/login.php';
		}
		header('Location: ' . TOP . $redirect);

	}
}
new Logout;
