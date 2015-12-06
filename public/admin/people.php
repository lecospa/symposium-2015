<?php
require_once('../../init.php');

class People extends \Controllers\AdminController {
	public function get() {
		$this->check('people_get');
		$conn = new \Conn();

		$people = \Models\People::all($conn);
		foreach ($people as &$person) {
			$person['talks'] = \Models\Talks::all_filter_person($conn, $person['id']);
			
			$person['tokens'] = \Models\Auth::all_by_id_and_scope($conn, $person['id'], 'People');

			$stmt = $conn->prepare("SELECT * FROM `committee_person` WHERE `person_id`=?");
			$stmt->execute(array($person['id']));
			$person['committees'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

			$stmt = $conn->prepare("SELECT * FROM `session` WHERE `name`='organizer' AND `value`=?");
			$stmt->execute(array($person['id']));
			$person['organizers'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}

		$sessions = \Models\Sessions::all_with_id_as_key($conn);

		$this->smarty->assign('people', $people);
		$this->smarty->assign('sessions', $sessions);
		$this->smarty->display('admin/people.tpl');
	}
}
new People;
