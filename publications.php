<?php
require_once('init.php');
class Publications extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('publications.html');
	}
}
new Publications;
