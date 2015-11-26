<?php
require_once('../../init.php');
class Social extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('announcement/november_2015.html');
	}
}
new Social;
