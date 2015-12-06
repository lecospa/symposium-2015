<?php
namespace Admin;
require_once('../../init.php');

class ParallelSession extends \Controllers\AdminController {
	public function get() {
		$this->check('parallel_session_get');
		$conn = new \Conn();
		$session_id = $_GET['session_id'];
		$session = \Models\Sessions::get($conn, $session_id);
		$session['organizers'] = \Models\Sessions::get_properties($conn, $session['id'], 'organizer');
		foreach ($session['organizers'] as &$organizer) {
			$organizer['content'] = \Models\People::get($conn, $organizer['value']);
		}
		$session['talks'] = \Models\Sessions::get_talks($conn, $session['id']);
		foreach ($session['talks'] as &$talk) {
			$talk['speaker'] = \Models\People::get($conn, $talk['person_id']);
		}

		// 將 location, date_time 合併成 slot
		$session['slots'] = array();
		$session['slots'][] = array('location' => $session['location_1'], 'date_time' => $session['date_time_1']);
		if (!empty($session['location_2'])) {
			$session['slots'][] = array('location' => $session['location_2'], 'date_time' => $session['date_time_2']);
		}

		$stmt = $conn->prepare("SELECT * FROM `people` ORDER BY `last_name`, `first_name`");
		$stmt->execute();
		$people = $stmt->fetchAll(\PDO::FETCH_ASSOC);

		$this->smarty->assign('session', $session);
		$this->smarty->assign('people', $people);
		$this->smarty->display('admin/parallel_session.edit.tpl');
	}
}
new ParallelSession;
