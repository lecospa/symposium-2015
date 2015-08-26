<?php
namespace Models;

class Auth {
	static public function get($conn, $token) {
		$stmt = $conn->prepare("SELECT `scope`, `id` FROM `auth` WHERE `token`=?");
		$stmt->execute(array($token));
		if ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
			return $row;
		}
		return null;
	}
	static public function insert($conn, $scope, $id, $token) {
		$stmt = $conn->prepare("INSERT INTO `auth` (`scope`, `id`, `token`) VALUES (?, ?, ?)");
		$stmt->execute(array($scope, $id, $token));
	}
	static public function update($conn, $scope, $id, $token) {
		$stmt = $conn->prepare("UPDATE `auth` SET `token`=? WHERE `scope`=? AND `id`=?");
		$stmt->execute(array($scope, $id, $token));
	}
}
