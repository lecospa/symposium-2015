<?php
require_once('../init.php');
class Social extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('social_opening_night_performance.html');
	}
}
new Social;
