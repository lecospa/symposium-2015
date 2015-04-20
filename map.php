<?php
require_once('init.php');
class Map extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);

		$this->smarty->display('map.html');
	}
}
new Map;
