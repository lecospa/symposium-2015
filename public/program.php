<?php
require_once('../init.php');
class Program extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		
		$conn = new \Conn();
		$plenary_speakers = \Models\People::all_by_type($conn, 'Plenary');
		$p = array();
		foreach ($plenary_speakers as $plenary_speaker) {
			$p[$plenary_speaker['id']] = $plenary_speaker;
		}

		$this->smarty->assign('plenary_speakers', $p);

		$this->smarty->display('program.html');
	}
}
new Program;
