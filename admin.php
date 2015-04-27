<?php
require_once('init.php');

class Admin extends \View {
	public function get() {
		$token = $_GET['token'];
		$auth = \Models\Auth::get(\db::get(), $token);
		if ($auth['scope'] == 'sudo') {
			
		} else {
		}
	}
}
new Admin;
