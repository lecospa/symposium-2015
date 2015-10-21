<?php
namespace Person;
require_once('../init.php');

class MMain extends \View {
	public function get() {
		$id = $_GET['id'];
		$person = \Models\People::get($conn, $auth['id']);
		$this->smarty->assign('person', $person);
		$this->smarty->display('person/view.html');
	}
}
new MMain;
