<?php
namespace API\Session;
require_once('../../../init.php');

class Abbreviation extends \Controllers\APIController {
	public function patch() {
		$this->check('sudo');
		$conn = new \Conn();
		$session_id = $_GET['session_id'];
		$abbreviation = $_POST['abbreviation'];
		$stmt = $conn->prepare("UPDATE `sessions` SET `abbreviation`=? WHERE `id`=?");
		$stmt->execute(array($abbreviation, $session_id));
		$this->json(array('status' => 'success'));
	}
}
new Abbreviation;
