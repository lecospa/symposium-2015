<?php
namespace Models;

class Sessions {
	static function all($conn) {
		$stmt = $conn->prepare("SELECT * FROM `sessions`");
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
	static function all_with_id_as_key($conn) {
		$stmt = $conn->prepare("SELECT * FROM `sessions`");
		$stmt->execute();
		$sessions = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		$s = array();
		foreach ($sessions as $session) {
			$s[$session['id']] = $session;
		}
		return $s;
	}
	static function get_properties($conn, $id, $name) {
		$stmt = $conn->prepare("SELECT * FROM `session` WHERE `session_id`=? AND `name`=?");
		$stmt->execute(array($id, $name));
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
	static function get($conn, $id) {
		$stmt = $conn->prepare("SELECT * FROM `sessions` WHERE `id`=?");
		$stmt->execute(array($id));
		return $stmt->fetch();
	}
	static function get_property($conn, $session_id, $name) {
		$stmt = $conn->prepare("SELECT * FROM `session` WHERE `session_id`=? AND `name`=?");
		$stmt->execute(array($session_id, $name));
		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}
	static function delete_property_by_id($conn, $id) {
		$stmt = $conn->prepare("DELETE FROM `session` WHERE `id`=?");
		$stmt->execute(array($id));
	}
	static function delete_property_by_name_value($conn, $name, $value) {
		$stmt = $conn->prepare("DELETE FROM `session` WHERE `name`=? AND `value`=?");
		$stmt->execute(array($name, $value));
	}
	static function update_property($conn, $session_id, $name, $value) {
		if (self::get_property($conn, $session_id, $name)) {
			$stmt = $conn->prepare("UPDATE `session` SET `value`=? WHERE `session_id`=? AND `name`=?");
			$stmt->execute(array($value, $session_id, $name));
		} else {
			self::insert_property($conn, $session_id, $name, $value);
		}
	}
	static function insert_property($conn, $session_id, $name, $value) {
		$stmt = $conn->prepare("INSERT INTO `session` (`session_id`, `name`, `value`) VALUES (?,?,?)");
		$stmt->execute(array($session_id, $name, $value));
	}
	/*
	 * for parallel session only
	 */
	static function get_talks($conn, $id) {
		$stmt = $conn->prepare("SELECT * FROM `talks` WHERE `session`='Parallel' AND `session_id`=? ORDER BY `session_ordering`");
		$stmt->execute(array($id));
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
}
