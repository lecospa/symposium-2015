<?php

class ISpeakers {
	function all($conn) {
		$stmt = $conn->prepare("SELECT `email`, `slide_file` FROM `ispeakers`");
		$stmt->execute();
		//$stmt->store_result();
		$stmt->bind_result($email, $slide_file);
		$data = array();
		while ($stmt->fetch()) {
			$data[] = array(
				'email' => $email,
				'slide_file' => $slide_file
			);
		}

		$stmt->close();
		$conn->close();
		return $data;
	}
	function get($conn, $id) {
		$stmt = $conn->prepare("SELECT `name`, `email`, `title`, `slide_file` FROM `ispeakers` WHERE `id` = ?");
		$stmt->bind_param('s', $id);
		$stmt->execute();
		$stmt->bind_result($name, $email, $title, $slide_file);
		$data = null;
		if ($stmt->fetch()) {
			$data = array(
				'name' => $name,
				'email' => $email,
				'title' => $title,
				'slide_file' => $slide_file
			);
		}

		$stmt->close();
		$conn->close();
		return $data;
	}
}
