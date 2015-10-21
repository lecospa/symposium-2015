<?php
require_once('init.php');
class Photos extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('photos.html');
	}
}
new Photos;
