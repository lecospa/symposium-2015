<?php
require_once('../../init.php');
class Social extends \Controllers\Controller {
	function get() {
		$this->smarty->display('social_events/national_center_for_traditional_arts.html');
	}
}
new Social;
