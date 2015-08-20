<?php
namespace Admin;
require_once('../../init.php');

class PersonDelete extends \View {
	public function post() {
		$token = $_GET['token'];
		$conn = \db::get();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$id = $_POST['id'];
			if (empty($id)) {
				header('Location: ' . TOP . 'admin/index.php?token='.$token);
				return;
			}
			$speaker_id = \Models\People::delete($conn, $id);
			$conn->close();
			header('Location: ' . TOP . 'admin/index.php?token='.$token);
		}
	}
}


new PersonDelete;
