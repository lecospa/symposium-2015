<?php
namespace Admin;
require_once('../init.php');

class Index extends \View {
	public function get() {
		$token = $_GET['token'];
		$auth = \Models\Auth::get(\db::get(), $token);
		if ($auth['scope'] == 'sudo') {
			$conn = \db::get();
			$ispeakers = \Models\People::all_with_token($conn);
			$conn->close();
			
			$this->smarty->assign('ispeakers', $ispeakers);

			$this->smarty->assign('token', $token);


			$this->smarty->display('admin/index.html');
		} else {
			header('Location: ' . TOP);
		}
	}
}
new Index;
