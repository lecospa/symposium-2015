<?php
namespace Models;
/*
 * A class for quick access the 
 */
class Query {
	protected $stmt;
	protected $connection;
	public function __construct($connection, $stmt) {
		$this->connection = $connection;
		$this->stmt = $stmt;
	}
	public static function prepare($connection, $sql) {
		$stmt = $connection->prepare($sql);
		return new Query($connection, $stmt);
	}
	public function fetch($array) {
		$this->stmt->execute($array);
		if ($row = $this->stmt->fetch(\PDO::FETCH_ASSOC)) {
			return $row;
		} else {
			return false;
		}
	}
	public function fetchAll($array) {
		$this->stmt->execute($array);
		return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
	public function execute($array) {
		return $this->stmt->execute($array);
	}
	public function fetchLastId($array) {
		$this->stmt->execute($array);
		return $this->connection->lastInsertId();
	}
}
