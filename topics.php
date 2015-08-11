<?php
require_once('init.php');
class Topics extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('topics.html');
	}
}
new Topics;
