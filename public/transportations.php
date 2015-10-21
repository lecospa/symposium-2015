<?php
require_once('../init.php');
class Transportations extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('transportations.html');
	}
}
new Transportations;
