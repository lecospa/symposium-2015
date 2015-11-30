<?php
require_once('../../init.php');
class Social extends \Controllers\Controller {
	function get() {
		$this->smarty->display('social_events/excursion.html');
	}
}
new Social;
