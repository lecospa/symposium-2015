<?php
namespace Models;

class Talks {
	static function all_filter_person($conn, $person_id) {
		$stmt = $conn->prepare("SELECT * FROM `talks` WHERE `person_id`=?");
		$stmt->execute(array($person_id));
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
}
