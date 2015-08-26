<?php
function get_connection() {
	return db::get();
}

class db {
	static function get() {
		$mysqli = new mysqli('localhost', 'symposium_2015', 'Wwz6wPFeyq2AsueK', 'symposium_2015');
		if ($mysqli->connect_error) {
			die('connect error');
		}
		return $mysqli;
	}
}

class Conn extends PDO {
	public function __construct() {
		$dns = 'mysql:host=localhost;dbname=symposium_2015;charset=utf8';
		$user = 'symposium_2015';
		$pass = 'Wwz6wPFeyq2AsueK';
		parent::__construct($dns, $user, $pass);
		$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
}
