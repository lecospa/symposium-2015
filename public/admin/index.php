<?php
require_once('../../init.php');

class AdminIndex extends \Controllers\AdminController {
	public function get() {
		$this->check('index_get');

		$this->smarty->display('admin/index.html');
	}
}
new AdminIndex;
