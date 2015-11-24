<?php
require_once('../../init.php');

class Talk extends \Controllers\Controller {
	public function patch() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'people') {
			$talk_id = $_GET['talk_id'];
			$title = $_POST['title'];
			$abstract = $_POST['abstract'];
			$session_id = $_POST['session_id'];
			
			$stmt = $conn->prepare("UPDATE `talks` SET `title`=?, `abstract`=?, `session_id`=? WHERE `person_id`=? AND `id`=?");
			$stmt->execute(array($title, $abstract, $session_id, $auth['id'], $talk_id));

			$_SESSION['message'] = 'Update successfully';

		}
		header('Location: ' . TOP . '/person.php?token=' . $token . '&mode=edit');
	}
}
new Talk;
