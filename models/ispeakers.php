<?php
namespace Models;

class ISpeakers {
	function all_with_token($conn) {
		$stmt = $conn->prepare("SELECT A.`id`, A.`name`, A.`email`, A.`slide_file`, A.`title`, A.`abstract`, B.`token`, A.`img` FROM `ispeakers` AS A LEFT JOIN `auth` AS B ON A.`id` = B.`id` WHERE B.`scope` = 'ispeakers' ORDER BY A.`name`");
		$stmt->execute();
		$stmt->bind_result($id, $name, $email, $slide_file, $title, $abstract, $token, $img);
		$data = array();
		while ($stmt->fetch()) {
			$data[] = array(
				'id' => $id,
				'name' => $name,
				'email' => $email,
				'slide_file' => $slide_file,
				'title' => $title,
				'abstract' => $abstract,
				'auth' => array(
					'token' => $token,
					'scope' => 'ispeakers'
				),
				'img' => $img
			);
		}

		$stmt->close();
		$conn->close();
		return $data;
	}
	function all($conn) {
		$stmt = $conn->prepare("SELECT `name`, `email`, `slide_file`, `title`, `abstract`, `img` FROM `ispeakers` ORDER BY `name`");
		$stmt->execute();
		$stmt->bind_result($name, $email, $slide_file, $title, $abstract, $img);
		$data = array();
		while ($stmt->fetch()) {
			$data[] = array(
				'name' => $name,
				'email' => $email,
				'slide_file' => $slide_file,
				'title' => $title,
				'abstract' => $abstract,
				'img' => $img
			);
		}
		$stmt->close();
		$conn->close();
		return $data;
	}
	function get($conn, $id) {
		$stmt = $conn->prepare("SELECT `name`, `email`, `title`, `abstract`, `slide_file`, `img` FROM `ispeakers` WHERE `id` = ?");
		$stmt->bind_param('s', $id);
		$stmt->execute();
		$stmt->bind_result($name, $email, $title, $abstract, $slide_file, $img);
		$data = null;
		if ($stmt->fetch()) {
			$data = array(
				'name' => $name,
				'email' => $email,
				'title' => $title,
				'abstract' => $abstract,
				'slide_file' => $slide_file,
				'img' => $img
			);
		}

		$stmt->close();
		$conn->close();
		return $data;
	}
	function update_slide_file($conn, $id, $slide_file) {
		$stmt = $conn->prepare("UPDATE `ispeakers` SET `slide_file` = ? WHERE `id` = ?");
		$stmt->bind_param('ss', $slide_file, $id);
		$stmt->execute();
		$stmt->close();
		$conn->close();
	}
	function update_img($conn, $id, $img) {
		$stmt = $conn->prepare("UPDATE `ispeakers` SET `img` = ? WHERE `id` = ?");
		$stmt->bind_param('ss', $img, $id);
		$stmt->execute();
		$stmt->close();
		$conn->close();
	}
	function update_title_abstract($conn, $id, $title, $abstract) {
		$stmt = $conn->prepare("UPDATE `ispeakers` SET `title` = ?, `abstract` = ? WHERE `id` = ?");
		$stmt->bind_param('sss', $title, $abstract, $id);
		$stmt->execute();
		$stmt->close();
		$conn->close();
	}
	function insert($conn, $name, $email) {
		$stmt = $conn->prepare("INSERT INTO `ispeakers` (`name`, `email`) VALUES (?, ?)");
		$stmt->bind_param('ss', $name, $email);
		$stmt->execute();
		$id = $stmt->insert_id;
		$stmt->close();
		$conn->close();
		return $id;
	}
}
