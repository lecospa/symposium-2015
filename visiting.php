<?php
require_once('init.php');
class Others extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('visiting.html');
	}
}
new Others;
