<?php
require_once('init.php');
class Travel_Visa extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('travel_and_visa.html');
	}
}
new Travel_Visa;
