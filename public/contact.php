<?php
require_once('../init.php');
class Contact extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('contact.html');
	}
}
new Contact;