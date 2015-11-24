<?php
// TODO: 要移除
require_once('../../init.php');

class Person extends \Controllers\Controller {
	public function get() {
		$id = $_GET['id'];
		$conn = new \Conn;
		$talks = \Models\Talks::all_filter_session_and_person($conn, 'Plenary', $id);

		if (count($talks) == 0) {
			throw new \NotFoundException();
		}
		header("HTTP/1.1 301 Moved Permanently"); 
		header('Location: ../plenary_session.php?talk_id=' . $talks[0]['id']);
	}
}
new Person;
