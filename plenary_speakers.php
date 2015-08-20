<?php
require_once('init.php');
class Plenary extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);

		$plenary_speakers = \Models\People::all_by_type(\db::get(), 'Plenary');
		$this->smarty->assign('plenary_speakers', $plenary_speakers);
		$this->smarty->display('plenary_speakers.html');
	}
}
new Plenary;
