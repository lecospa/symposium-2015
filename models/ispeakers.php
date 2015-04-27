<?php
namespace Models;

class ISpeakers {
	function all_with_token($conn) {
		$stmt = $conn->prepare("SELECT A.`id`, A.`name`, A.`email`, A.`slide_file`, A.`title`, A.`abstract`, B.`token` FROM `ispeakers` AS A LEFT JOIN `auth` AS B ON A.`id` = B.`id` WHERE B.`scope` = 'ispeakers' ORDER BY A.`name`");
		$stmt->execute();
		$stmt->bind_result($id, $name, $email, $slide_file, $title, $abstract, $token);
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
				)
			);
		}

		$stmt->close();
		$conn->close();
		return $data;
	}
	function all($conn) {
		$stmt = $conn->prepare("SELECT `name`, `email`, `slide_file`, `title`, `abstract` FROM `ispeakers`");
		$stmt->execute();
		$stmt->bind_result($name, $email, $slide_file, $title, $abstract);
		$data = array();
		while ($stmt->fetch()) {
			$data[] = array(
				'name' => $name,
				'email' => $email,
				'slide_file' => $slide_file,
				'title' => $title,
				'abstract' => $abstract
			);
		}

		$stmt->close();
		$conn->close();
		return $data;
	}
	function get($conn, $id) {
		$stmt = $conn->prepare("SELECT `name`, `email`, `title`, `abstract`, `slide_file` FROM `ispeakers` WHERE `id` = ?");
		$stmt->bind_param('s', $id);
		$stmt->execute();
		$stmt->bind_result($name, $email, $title, $abstract, $slide_file);
		$data = null;
		if ($stmt->fetch()) {
			$data = array(
				'name' => $name,
				'email' => $email,
				'title' => $title,
				'abstract' => $abstract,
				'slide_file' => $slide_file
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
	function update_title_abstract($conn, $id, $title, $abstract) {
		$stmt = $conn->prepare("UPDATE `ispeakers` SET `title` = ?, `abstract` = ? WHERE `id` = ?");
		$stmt->bind_param('sss', $title, $abstract, $id);
		$stmt->execute();
		$stmt->close();
		$conn->close();
	}
}
