<?php
namespace API\Session;
require_once('../../../init.php');

class Title extends \Controllers\APIController {
	public function patch() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$session_id = $_GET['session_id'];
			$title = $_POST['title'];
			
			$stmt = $conn->prepare("UPDATE `sessions` SET `title`=? WHERE `id`=?");
			$stmt->execute(array($title, $session_id));

			$this->json(array('status' => 'success'));
		} else {
			throw new \UnauthorizedException();
		}
	}
}
new Title;
