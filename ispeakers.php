<?php
require_once('init.php');
class ISpeakers extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);

		$ispeakers = \Models\ISpeakers::all(db::get());
		$this->smarty->assign('ispeakers', $ispeakers);
		$this->smarty->display('ispeakers.html');
	}
}
new ISpeakers;
