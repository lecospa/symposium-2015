<?php
function get_connection() {
	$mysqli = new mysqli('localhost', 'symposium_2015', 'Wwz6wPFeyq2AsueK', 'symposium_2015');
	if ($mysqli->connect_error) {
		die('connect error');
	}
	return $mysqli;
}
