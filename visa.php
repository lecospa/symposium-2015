<?php
require_once('init.php');
class Visa extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('visa.html');
	}
}
new Visa;
