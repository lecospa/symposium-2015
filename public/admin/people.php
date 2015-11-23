<?php
require_once('../../init.php');

class AdminPeopleIndex extends \Controllers\Controller {
	public function get() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$stmt = $conn->prepare("SELECT * FROM `people` ORDER BY `last_name`, `first_name`");
			$stmt->execute();
			$people = $stmt->fetchAll(\PDO::FETCH_ASSOC);

			foreach ($people as &$person) {
				$person['talks'] = \Models\Talks::all_filter_person($conn, $person['id']);

				$stmt = $conn->prepare("SELECT * FROM `auth` WHERE `id`=? AND `scope`='People'");
				$stmt->execute(array($person['id']));
				$person['tokens'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);
				
				$stmt = $conn->prepare("SELECT * FROM `committee_person` WHERE `person_id`=?");
				$stmt->execute(array($person['id']));
				$person['committees'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

				$stmt = $conn->prepare("SELECT * FROM `session` WHERE `name`='organizer' AND `value`=?");
				$stmt->execute(array($person['id']));
				$person['organizers'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			}

			$sessions = \Models\Sessions::all_with_id_as_key($conn);

			$this->smarty->assign('people', $people);
			$this->smarty->assign('token', $token);
			$this->smarty->assign('sessions', $sessions);
			$this->smarty->display('admin/people.html');
		} else {
			throw new \UnauthorizedException();
		}
	}
}
new AdminPeopleIndex;
