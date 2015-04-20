<?php
require_once('init.php');
class Program extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('program.html');
	}
}
new Program;
