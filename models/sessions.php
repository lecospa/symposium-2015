<?php
namespace Models;

class Sessions {
	static function all($conn) {
		$stmt = $conn->prepare("SELECT * FROM `sessions`");
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
	static function get_properties($conn, $id, $name) {
		$stmt = $conn->prepare("SELECT * FROM `session` WHERE `session_id`=? AND `name`=?");
		$stmt->execute(array($id, $name));
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
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
}
