<?php
require_once('init.php');
class Accomodation extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('accomodation.html');
	}
}
new Accomodation;
