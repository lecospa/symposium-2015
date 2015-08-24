<?php
namespace Admin;
require_once('../init.php');

class Index extends \View {
	public function get() {
		$token = $_GET['token'];
		$auth = \Models\Auth::get(\db::get(), $token);
		if ($auth['scope'] == 'sudo') {
			$conn = \db::get();
			$plenary_speakers = \Models\People::all_with_token_by_type($conn, 'Plenary');
			$parallel_speakers = \Models\People::all_with_token_by_type($conn, 'Parallel');
			$poster_speakers = \Models\People::all_with_token_by_type($conn, 'Poster');
			$attendees = \Models\People::all_with_token_by_type($conn, 'Normal');
			$conn->close();

			$this->smarty->assign('plenary_speakers', $plenary_speakers);
			$this->smarty->assign('parallel_speakers', $parallel_speakers);
			$this->smarty->assign('poster_speakers', $poster_speakers);
			$this->smarty->assign('attendees', $attendees);
			$this->smarty->assign('token', $token);
			$this->smarty->display('admin/index.html');
		} else {
			header('Location: ' . TOP);
		}
	}
}
new Index;
