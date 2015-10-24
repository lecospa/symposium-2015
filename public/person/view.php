<?php
namespace Person;
require_once('../../init.php');

class MMain extends \Controllers\Controller {
	public function get() {
//讀取網址的ID
		$id = $_GET['id'];
//用ID找到person後把資料拿出來
		$conn = new \Conn();
		$person = \Models\People::get($conn, $id);
//給view.html
		$this->smarty->assign('person', $person);
		$this->smarty->display('person/view.html');
	}
}
new MMain;
