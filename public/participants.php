<?php
require_once('init.php');
class Participants extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('participants.html');
	}
}
new Participants;
