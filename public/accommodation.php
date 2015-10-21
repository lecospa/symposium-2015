<?php
require_once('../init.php');
class Accommodation extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('accommodation.html');
	}
}
new Accommodation;
