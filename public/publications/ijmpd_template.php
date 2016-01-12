<?php
require_once('../../init.php');
class Publications extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('publications/ijmpd_template.html');
	}
}
new Publications;
