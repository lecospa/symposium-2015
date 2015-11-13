<?php
require_once('../init.php');
class Social extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('social_symposium_banquet.html');
	}
}
new Social;
