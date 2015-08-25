<?php
namespace Models;

class People {
	static function all_with_token_by_type($conn, $type) {
		$stmt = $conn->prepare("SELECT A.`id`, A.`first_name`, A.`last_name`, A.`email`, A.`slide_file`, A.`title`, A.`abstract`, 
			A.`address_datetime`, A.`occupation`, A.`resume`, A.`room`, B.`token`, A.`img` 
			FROM `people` AS A LEFT JOIN `auth` AS B ON A.`id` = B.`id` 
			WHERE B.`scope` = 'people' AND A.`type`=?
			ORDER BY A.`last_name`"
		);
		$stmt->bind_param('s', $type);
		$stmt->execute();
		$stmt->bind_result($id, $first_name, $last_name, $email, $slide_file, 
			$title, $abstract, $address_datetime, $occupation, $resume, $room, $token, $img
		);
		$data = array();
		while ($stmt->fetch()) {
			$data[] = array(
				'id' => $id,
				'first_name' => $first_name,
				'last_name' => $last_name,
				'email' => $email,
				'slide_file' => $slide_file,
				'title' => $title,
				'abstract' => $abstract,
				'address_datetime' => $address_datetime,
				'occupation' => $occupation,
				'resume' => $resume,
				'room' => $room,
				'auth' => array(
					'token' => $token,
					'scope' => 'people'
				),
				'img' => $img
			);
		}
		$stmt->close();
		return $data;
	}
	static function all_by_type($conn, $type) {
		$stmt = $conn->prepare("SELECT `first_name`, `last_name`, `email`, `slide_file`, `title`, `abstract`, 
			`address_datetime`, `occupation`, `resume`, `room`, `img` 
			FROM `people` 
			WHERE `type`=?
			ORDER BY `last_name`");
		$stmt->bind_param('s', $type);
		$stmt->execute();
		$stmt->bind_result($first_name, $last_name, $email, $slide_file, 
			$title, $abstract, $address_datetime, $occupation, $resume, $room, $img
		);
		$data = array();
		while ($stmt->fetch()) {
			$data[] = array(
				'first_name' => $first_name,
				'last_name' => $last_name,
				'email' => $email,
				'slide_file' => $slide_file,
				'title' => $title,
				'abstract' => $abstract,
				'address_datetime' => $address_datetime,
				'occupation' => $occupation,
				'resume' => $resume,
				'room' => $room,
				'img' => $img
			);
		}
		$stmt->close();
		return $data;
	}
	static function get($conn, $id) {
		$stmt = $conn->prepare("SELECT * FROM `people` WHERE `id`=:id");
		$stmt->execute(array(':id' => $id));
		$data = null;
		if ($row = $stmt->fetch()) {
			return $row;
		}
		return $data;
	}
	static function update_slide_file($conn, $id, $slide_file) {
		$stmt = $conn->prepare("UPDATE `people` SET `slide_file` = ? WHERE `id` = ?");
		$stmt->bind_param('ss', $slide_file, $id);
		$stmt->execute();
		$stmt->close();
	}
	static function update_img($conn, $id, $img) {
		$stmt = $conn->prepare("UPDATE `people` SET `img` = ? WHERE `id` = ?");
		$stmt->bind_param('ss', $img, $id);
		$stmt->execute();
		$stmt->close();
	}
	static function update_title_abstract($conn, $id, $title, $abstract) {
		$stmt = $conn->prepare("UPDATE `people` SET `title` = ?, `abstract` = ? WHERE `id` = ?");
		$stmt->bind_param('sss', $title, $abstract, $id);
		$stmt->execute();
		$stmt->close();
	}
	
	static function update_($conn, $id, $first_name, $last_name, $email, $title, $abstract, $address_datetime, $occupation, $resume, $room, $session_code, $type) {
		$stmt = $conn->prepare("UPDATE `people` SET `first_name` = ?, `last_name` = ?, `email` = ?, `title` = ?, `abstract` = ?,
			`address_datetime` = ?, `occupation` = ?, `resume` = ?, `room` = ?, `session_code`=?, `type`=? WHERE `id` = ?"
		);
		$stmt->bind_param('ssssssssssss', $first_name, $last_name, $email, $title, $abstract, 
			$address_datetime, $occupation, $resume, $room, $session_code, $type, $id
		);
		$stmt->execute();
		$stmt->close();
	}

	static function update_limited($conn, $id, $title, $abstract, $session_code) {
		$stmt = $conn->prepare("UPDATE `people` SET `title` = ?, `abstract` = ?, `session_code`=? WHERE `id` = ?");
		$stmt->bind_param('ssss', $title, $abstract, $session_code, $id);
		$stmt->execute();
		$stmt->close();
	}
	static function insert($conn, $type, $first_name, $last_name, $email) {
		$stmt = $conn->prepare("INSERT INTO `people` (`type`, `first_name`, `last_name`, `email`) VALUES (?, ?, ?, ?)");
		$stmt->bind_param('ssss', $type, $first_name, $last_name, $email);
		if (!$stmt->execute()) {
			throw new \Exception($stmt->error);
		}
		$id = $stmt->insert_id;
		$stmt->close();
		return $id;
	}
	static function delete($conn, $id) {
		$stmt = $conn->prepare("DELETE FROM `people` WHERE `id`=?");
		$stmt->bind_param('s', $id);
		$stmt->execute();
		$stmt->close();
	}
}
