<?php
require_once('../init.php');
class Companion extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('companion_program.html');
	}
}
new Companion;
