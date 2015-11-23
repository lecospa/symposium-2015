<?php
namespace Models;

class Talks {
	static function all_filter_person($conn, $person_id) {
		$stmt = $conn->prepare("SELECT * FROM `talks` WHERE `person_id`=?");
		$stmt->execute(array($person_id));
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
	static function all_filter_session($conn, $session) {
		$stmt = $conn->prepare("SELECT * FROM `talks` WHERE `session`=?");
		$stmt->execute(array($session));
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
	static function all_filter_session_and_person($conn, $session, $person_id) {
		$stmt = $conn->prepare("SELECT * FROM `talks` WHERE `session`=? AND `person_id`=?");
		$stmt->execute(array($session, $person_id));
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
	static function get($conn, $talk_id) {
		$stmt = $conn->prepare("SELECT * FROM `talks` WHERE `id`=?");
		$stmt->execute(array($talk_id));
		if ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
			return $row;
		} else {
			return null;
		}
	}
}
