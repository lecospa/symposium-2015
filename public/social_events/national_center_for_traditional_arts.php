<?php
require_once('../../init.php');
class SocialEvents extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('social_events/national_center_for_traditional_arts.html');
	}
}
new SocialEvents;
