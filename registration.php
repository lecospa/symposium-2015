<?php
require_once('init.php');
class Registration extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);

		$this->smarty->assign('opendate', mktime(0, 0, 0, 4, 15, 2015));
		$this->smarty->display('registration.html');
	}
}
new Registration;
