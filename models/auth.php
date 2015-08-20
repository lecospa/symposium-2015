<?php
namespace Models;

class Auth {
	static public function get($conn, $token) {
		$stmt = $conn->prepare("SELECT `scope`, `id` FROM `auth` WHERE `token` = ?");
		$stmt->bind_param('s', $token);
		$stmt->execute();
		$stmt->bind_result($scope, $id);

		$data = null;
		if ($stmt->fetch()) {
			$data = array(
				'scope' => $scope,
				'id' => $id
			);
		}
		$stmt->close();
		return $data;
	}
	static public function insert($conn, $scope, $id, $token) {
		$stmt = $conn->prepare("INSERT INTO `auth` (`scope`, `id`, `token`) VALUES (?, ?, ?)");
		$stmt->bind_param('sds', $scope, $id, $token);
		$stmt->execute();
		$stmt->close();
	}
	static public function update($conn, $scope, $id, $token) {
		$stmt = $conn->prepare("UPDATE `auth` SET `token`=? WHERE `scope`=? AND `id`=?");
		$stmt->bind_param('sds', $scope, $id, $token);
		$stmt->execute();
		$stmt->close();
	}
}
