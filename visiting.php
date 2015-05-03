<?php
require_once('init.php');
class Visiting extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('visitnig.html');
	}
}
new Visiting;
