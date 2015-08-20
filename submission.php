<?php
require_once('init.php');
class Submission extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('submission.html');
	}
}
new Submission;
