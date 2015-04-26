<?php
require_once('init.php');
class Index extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('index.html');
	}
}
new Index;
