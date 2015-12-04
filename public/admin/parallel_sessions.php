<?php
require_once('../../init.php');

class Sessions extends \Controllers\Controller {
	public function get() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$sessions = \Models\Sessions::all($conn);

			foreach ($sessions as &$session) {
				$session['organizers'] = \Models\Sessions::get_properties($conn, $session['id'], 'organizer');
				foreach ($session['organizers'] as &$organizer) {
					$organizer['content'] = \Models\People::get($conn, $organizer['value']);
				}
				$session['talks'] = \Models\Sessions::get_talks($conn, $session['id']);
				foreach ($session['talks'] as &$talk) {
					$talk['person'] = \Models\People::get($conn, $talk['person_id']);
				}
				
				// 將 location, date_time 合併成 slot
				$session['slots'] = array();
				$session['slots'][] = array('location' => $session['location_1'], 'date_time' => $session['date_time_1']);
				if (!empty($session['location_2'])) {
					$session['slots'][] = array('location' => $session['location_2'], 'date_time' => $session['date_time_2']);
				}
			}
			$this->smarty->assign('sessions', $sessions);
			$this->smarty->assign('token', $token);
			$this->smarty->display('admin/parallel_sessions.tpl');
		} else {
			throw new \UnauthorizedException();
		}
	}
}
new Sessions;
