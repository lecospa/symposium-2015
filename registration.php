<?php
require_once('init.php');
class Registration extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('registration.html');
	}
}
new Registration;
