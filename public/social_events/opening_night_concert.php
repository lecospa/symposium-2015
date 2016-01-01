<?php
require_once('../../init.php');
class SocialEvents extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('social_events/opening_night_concert.html');
	}
}
new SocialEvents;
