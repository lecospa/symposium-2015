<?php
namespace Admin;
require_once('../../init.php');

class IspeakersDelete extends \View {
	public function post() {
		$token = $_GET['token'];
		$auth = \Models\Auth::get(\db::get(), $token);
		if ($auth['scope'] == 'sudo') {
			$id = $_POST['id'];
			if (empty($id)) {
				header('Location: ' . TOP . 'admin/index.php?token='.$token);
				return;
			}
			$speaker_id = \Models\ISpeakers::delete(\db::get(), $id);
			header('Location: ' . TOP . 'admin/index.php?token='.$token);
		}
	}
}


new IspeakersDelete;
