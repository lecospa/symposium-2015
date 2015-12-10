<?php
namespace Models;

class Logging {
	private $insert_stmt;
	private $remote_address;
	private $forward_address;
	private $conn;
	/*
	 * @param
	 * $conn: 資料庫連線
	 * $server: 伺服器組態, 可放 $_SERVER
	 */
	public function __construct($conn, $server) {
		$this->conn = $conn;
		$this->remote_address = $server['REMOTE_ADDR'];
		if (!empty($_server['HTTP_X_FORWARDED_FOR'])) {
			$this->forward_address = $server['HTTP_X_FORWARDED_FOR'];
		}
		$this->insert_stmt = $this->conn->prepare("INSERT INTO `logging` (`event`, `content`, `REMOTE_ADDR`, `HTTP_X_FORWARDED_FOR`) VALUES (?, ?, ?, ?)");
	}
	/*
	 * 插入一筆 logging
	 * @param
	 * $event: 事件名稱
	 * $content: 事件資料
	 * $remote_address: 遠端IP位址
	 * $forward_address: 遠端透過forward的IP位址
	 */
	public function insert($event, $content, $remote_address, $forward_address) {
		$this->insert_stmt->execute(array($event, $content, $remote_address, $forward_address));
	}
	/*
	 * 插入一筆 logging
	 * function insert() 的捷徑
	 */
	public function info($event, $content) {
		$this->insert($event, $content, $this->remote_address, $this->forward_address);
	}
}
