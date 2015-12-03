<?php
namespace Models;
/*
 * 存取參加者(Person)的各欄位資料
 *
 * @param
 * conn: 資料庫連線
 */

class People {
	/*
	 * 取得一個 person
	 */
	static function get_stmt($conn) {
		$stmt = $conn->prepare("SELECT * FROM `people` WHERE `id`=?");
		return new Query($conn, $stmt);
	}
	static function get($conn, $id) {
		return self::get_stmt($conn)->fetch(array($id));
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
	
	static function update_($conn, $id, $first_name, $last_name, $email, $occupation, $resume, $room) {
		$stmt = $conn->prepare("UPDATE `people` SET `first_name` = ?, `last_name` = ?, `email` = ?, `occupation` = ?, `resume` = ?, `room` = ? WHERE `id` = ?"
		);
		$stmt->execute(array(
			$first_name, $last_name, $email, $occupation, $resume, $room, $id
		));
	}

	static function update_limited($conn, $id, $title, $abstract, $session_id) {
		$stmt = $conn->prepare("UPDATE `people` SET `title` = ?, `abstract` = ?, `session_id`=? WHERE `id` = ?");
		$stmt->execute(array($title, $abstract, $session_id, $id));
	}
	static function update_session_id($conn, $id, $session_id) {
		$stmt = $conn->prepare("UPDATE `people` SET `session_id`=? WHERE `id` = ?");
		$stmt->execute(array($session_id, $id));
	}
	/*
	 * 新增一個Person
	 * @return 代表Person的id
	 */
	static function insert($conn, $first_name, $last_name, $email) {
		$stmt = $conn->prepare("INSERT INTO `people` (`first_name`, `last_name`, `email`) VALUES (?, ?, ?)");
		$stmt->execute(array($first_name, $last_name, $email));
		$id = $conn->lastInsertId();
		return $id;
	}
	static function delete($conn, $id) {
		$stmt = $conn->prepare("DELETE FROM `people` WHERE `id`=?");
		$stmt->execute(array($id));
	}
	static function delete_slide_file($conn, $id) {
		$stmt = $conn->prepare("DELETE FROM `slide_file` WHERE `id` = ?");
		$stmt->execute(array($id));
	}
}
