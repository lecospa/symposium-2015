<?php
require_once('init.php');
class Index extends View {
	function get() {
		$this->smarty->display('index.html');
	}
}
new Index;
