<?php
require_once('init.php');
class About_Taiwan extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('about_taiwan.html');
	}
}
new About_Taiwan;
