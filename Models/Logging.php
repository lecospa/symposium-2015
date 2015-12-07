<?php
namespace Models;

class Logging {
	public function insert($event, $content, $remote_address, $forward_address) {
		$this->insert_stmt->execute(array($event, $content, $remote_address, $forward_address));
	}
	private $insert_stmt;
	private $remote_address;
	private $forward_address;
	private $conn;
	public function __construct($conn, $server) {
		$this->conn = $conn;
		$this->remote_address = $server['REMOTE_ADDR'];
		if (!empty($_server['HTTP_X_FORWARDED_FOR'])) {
			$this->forward_address = $server['HTTP_X_FORWARDED_FOR'];
		}
		$this->insert_stmt = $this->conn->prepare("INSERT INTO `logging` (`event`, `content`, `REMOTE_ADDR`, `HTTP_X_FORWARDED_FOR`) VALUES (?, ?, ?, ?)");
	}
	public function info($event, $content) {
		$this->insert($event, $content, $this->remote_address, $this->forward_address);
	}
}
