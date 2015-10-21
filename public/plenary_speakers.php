<?php
require_once('../init.php');
class Plenary extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		
		$conn = new \Conn();
		$plenary_speakers = \Models\People::all_by_type($conn, 'Plenary');
		$this->smarty->assign('plenary_speakers', $plenary_speakers);
		$this->smarty->display('plenary_speakers.html');
	}
}
new Plenary;
