<?php
namespace Models;

class Sessions {
	static function all($conn) {
		$stmt = $conn->prepare("SELECT * FROM `sessions`");
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
	static function get_title($conn, $id) {
		$stmt = $conn->prepare("SELECT `id`, `value` FROM `session` WHERE `id`=? AND `name`='title'");
		$stmt->execute(array($id));
		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}
	static function get_property($conn, $id, $name) {
		$stmt = $conn->prepare("SELECT `id`, `name`, `value` FROM `session` WHERE `id`=? AND `name`=?");
		$stmt->execute(array($id, $name));
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
}
