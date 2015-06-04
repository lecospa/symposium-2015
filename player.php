<?php
require_once('init.php');
class Player extends View {
	function get() {
		$ispeakers = \Models\ISpeakers::all(db::get());
		$this->smarty->assign('ispeakers', $ispeakers);
		$this->smarty->display('player.html');
	}
}
new Player;
