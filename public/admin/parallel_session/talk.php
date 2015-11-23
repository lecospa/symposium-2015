<?php
namespace Admin;
require_once('../../../init.php');

class Talk extends \Controllers\Controller {
	public function post() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$session_id = $_GET['session_id'];
			$person_id = $_POST['person_id'];

			$stmt = $conn->prepare("SELECT * FROM `talks` WHERE `person_id`=? AND `session`='Parallel' AND `session_id`=?");
			$stmt->execute(array($person_id, $session_id));
			if ($row = $stmt->fetch()) {
				// do nothing, because of $person_id alrealy in $session_id
			} else {
				$stmt = $conn->prepare("SELECT * FROM `talks` WHERE `person_id`=? AND `session`='Parallel' AND `session_id`='0'");
				$stmt->execute(array($person_id));

				if ($row = $stmt->fetch()) {
					// have record, replace
					$talk_id = $row['id'];
					$stmt = $conn->prepare("UPDATE `talks` SET `session_id`=? WHERE `id`=?");
					$stmt->execute(array($session_id, $talk_id));
				} else {
					// no record, insert
					$stmt = $conn->prepare("INSERT INTO `talks` (`person_id`, `session`, `session_id`) VALUES (?,?,?)");
					$stmt->execute(array($person_id, 'Parallel', $session_id));
				}
			}

			header('Location: ../parallel_session.php?mode=edit&session_id='. $session_id . '&token=' . $token);
		} else {
			throw new \UnauthorizedException();
		}
	}
	public function delete() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$session_id = $_GET['session_id'];
			$talk_id = $_GET['talk_id'];
			
			$stmt = $conn->prepare("UPDATE `talks` SET `session_id`=0 WHERE `id`=?");
			$stmt->execute(array($talk_id));

			header('Location: ../parallel_session.php?mode=edit&session_id='. $session_id . '&token=' . $token);
		} else {
			throw new \UnauthorizedException();
		}
	}
}
new Talk;
