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
}
