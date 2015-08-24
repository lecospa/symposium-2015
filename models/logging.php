<?php
namespace Models;

class Logging {
	static function insert($conn, $event, $content, $remote_address, $forward_address) {
		$stmt = $conn->prepare("INSERT INTO `logging` (`event`, `content`, `REMOTE_ADDR`, `HTTP_X_FORWARDED_FOR`) VALUES (?, ?, ?, ?)");
		if (!$stmt) {
			throw new \Exception('prepare fail');
		}
		$stmt->bind_param('ssss', $event, $content, $remote_address, $forward_address);
		if (!$stmt->execute()) {
			throw new \Exception($stmt->error);
		}
		$stmt->close();
	}
	private $remote_address;
	private $forward_address;
	private $conn;
	public function __construct($conn, $server) {
		$this->conn = $conn;
		$this->remote_address = $server['REMOTE_ADDR'];
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$this->forward_address = $server['HTTP_X_FORWARDED_FOR'];
		}
	}
	public function info($event, $content) {
		Logging::insert($this->conn, $event, $content, $this->remote_address, $this->forward_address);
	}
}
