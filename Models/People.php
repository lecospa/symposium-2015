<?php
namespace Models;
/*
 * 存取參加者(Person)的各欄位資料
 *
 * @param
 * conn: 資料庫連線
 */

class People {
	static function all_with_token_by_type($conn, $type) {
		$stmt = $conn->prepare("SELECT A.*, B.`token`, B.`scope` 
			FROM `people` AS A LEFT JOIN `auth` AS B ON A.`id` = B.`id` 
			WHERE B.`scope` = 'people' AND A.`type`=?
			ORDER BY A.`last_name`"
		);
		$stmt->execute(array($type));
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
	static function all_by_type($conn, $type) {
		$stmt = $conn->prepare("SELECT * FROM `people` WHERE `type`=? ORDER BY `last_name`");
		$stmt->execute(array($type));
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
	static function get($conn, $id) {
		$stmt = $conn->prepare("SELECT * FROM `people` WHERE `id`=?");
		$stmt->execute(array($id));
		$data = null;
		if ($row = $stmt->fetch()) {
			return $row;
		}
		return $data;
	}
	static function update_slide_file($conn, $id, $slide_file) {
		$stmt = $conn->prepare("UPDATE `people` SET `slide_file` = ? WHERE `id` = ?");
		$stmt->execute(array($slide_file, $id));
	}
	static function update_img($conn, $id, $img) {
		$stmt = $conn->prepare("UPDATE `people` SET `img` = ? WHERE `id` = ?");
		$stmt->execute(array($img, $id));
	}
	static function update_title_abstract($conn, $id, $title, $abstract) {
		$stmt = $conn->prepare("UPDATE `people` SET `title` = ?, `abstract` = ? WHERE `id` = ?");
		$stmt->execute(array($title, $abstract, $id));
	}
	
	static function update_($conn, $id, $first_name, $last_name, $email, $title, $abstract, $address_datetime, $occupation, $resume, $room, $session_code, $type) {
		$stmt = $conn->prepare("UPDATE `people` SET `first_name` = ?, `last_name` = ?, `email` = ?, `title` = ?, `abstract` = ?,
			`address_datetime` = ?, `occupation` = ?, `resume` = ?, `room` = ?, `session_id`=?, `type`=? WHERE `id` = ?"
		);
		$stmt->execute(array(
			$first_name, $last_name, $email, $title, $abstract, 
			$address_datetime, $occupation, $resume, $room, $session_code, $type, $id
		));
	}

	static function update_limited($conn, $id, $title, $abstract, $session_code) {
		$stmt = $conn->prepare("UPDATE `people` SET `title` = ?, `abstract` = ?, `session_id`=? WHERE `id` = ?");
		$stmt->execute(array($title, $abstract, $session_code, $id));
	}
	static function update_session_id($conn, $id, $session_id) {
		$stmt = $conn->prepare("UPDATE `people` SET `session_id`=? WHERE `id` = ?");
		$stmt->execute(array($session_id, $id));
	}
	/*
	 * 新增一個Person
	 * @return 代表Person的id
	 */
	static function insert($conn, $type, $first_name, $last_name, $email) {
		$stmt = $conn->prepare("INSERT INTO `people` (`type`, `first_name`, `last_name`, `email`) VALUES (?, ?, ?, ?)");
		$stmt->execute(array($type, $first_name, $last_name, $email));
		$id = $conn->lastInsertId();
		return $id;
	}
	static function delete($conn, $id) {
		$stmt = $conn->prepare("DELETE FROM `people` WHERE `id`=?");
		$stmt->execute(array($id));
	}
}
