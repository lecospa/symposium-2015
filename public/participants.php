<?php
require_once('../init.php');
class Participants extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('participants.html');
	}
}
new Participants;
