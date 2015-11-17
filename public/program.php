<?php
require_once('../init.php');
class Program extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		
		$conn = new \Conn();
		$plenary_speakers = \Models\People::all_by_type($conn, 'Plenary');
		$parallel_speakers = \Models\People::all_by_type($conn, 'Parallel');
		$p = array();
		foreach ($plenary_speakers as $plenary_speaker) {
			$p[$plenary_speaker['id']] = $plenary_speaker;
		}
		foreach ($parallel_speakers as $parallel_speaker) {
			$p[$parallel_speaker['id']] = $parallel_speaker;
		}

		$this->smarty->assign('people', $p);
		
		$sessions = \Models\Sessions::all($conn);
		$s = array();
		foreach ($sessions as $session) {
			$s[$session['id']] = array(
				'id' => $session['id'],
				'abbreviation' => \Models\Sessions::get_property($conn, $session['id'], 'abbreviation')['value']
			);
		}
		$this->smarty->assign('session', $s);

		$this->smarty->display('program.html');
	}
}
new Program;
