<?php
require_once('init.php');
class Committee extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('committee.html');
	}
}
new Committee;
