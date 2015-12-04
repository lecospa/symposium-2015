<?php
namespace API\Session;
require_once('../../../init.php');

class Abbreviation extends \Controllers\APIController {
	public function patch() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$session_id = $_GET['session_id'];
			$abbreviation = $_POST['abbreviation'];
			$stmt = $conn->prepare("UPDATE `sessions` SET `abbreviation`=? WHERE `id`=?");
			$stmt->execute(array($abbreviation, $session_id));
			$this->json(array('status' => 'success'));
		} else {
			throw new \UnauthorizedException();
		}
	}
}
new Abbreviation;
