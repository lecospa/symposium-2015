<?php
require_once('../init.php');
class Photos extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('photos.html');
	}
}
new Photos;
