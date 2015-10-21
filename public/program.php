<?php
require_once('../init.php');
class Program extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('program.html');
	}
}
new Program;
