<?php
require_once('../../init.php');
class Social extends \Controllers\Controller {
	function get() {
		$this->smarty->display('social_events/symposium_banquet.html');
	}
}
new Social;
