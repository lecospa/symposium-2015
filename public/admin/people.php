<?php
require_once('../../init.php');

class AdminPeopleIndex extends \Controllers\Controller {
	public function get() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$plenary_speakers = \Models\People::all_with_token_by_type($conn, 'Plenary');
			$parallel_speakers = \Models\People::all_with_token_by_type($conn, 'Parallel');
			$poster_speakers = \Models\People::all_with_token_by_type($conn, 'Poster');
			$attendees = \Models\People::all_with_token_by_type($conn, 'Normal');

			$this->smarty->assign('plenary_speakers', $plenary_speakers);
			$this->smarty->assign('parallel_speakers', $parallel_speakers);
			$this->smarty->assign('poster_speakers', $poster_speakers);
			$this->smarty->assign('attendees', $attendees);
			$this->smarty->assign('token', $token);
			$this->smarty->display('admin/people.html');
		} else {
			throw new \UnauthorizedException();
		}
	}
}
new AdminPeopleIndex;
