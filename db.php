<?php
function get_connection() {
	return db::get();
}

class db {
	function get() {
		$mysqli = new mysqli('localhost', 'symposium_2015', 'Wwz6wPFeyq2AsueK', 'symposium_2015');
		if ($mysqli->connect_error) {
			die('connect error');
		}
		return $mysqli;
	}
}
