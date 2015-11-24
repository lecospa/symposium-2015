<?php
require_once('../../init.php');

class Person extends \Controllers\Controller {
	public function get() {
		$token = $_GET['token'];
		$id = $_GET['id'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$person = \Models\People::get($conn, $id);
			
			$stmt = $conn->prepare("SELECT * FROM `talks` WHERE `person_id`=?");
			$stmt->execute(array($id));
			$talks = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			
			$sessions = \Models\Sessions::all_with_id_as_key($conn);

			$this->smarty->assign('person', $person);
			$this->smarty->assign('talks', $talks);
			$this->smarty->assign('token', $token);
			$this->smarty->assign('sessions', $sessions);
			$this->smarty->display('admin/person.edit.tpl');
		} else {
			throw new \UnauthorizedException();
		}
	}
	public function patch() {
		$token = $_GET['token'];
		$id = $_GET['id'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$email = $_POST['email'];
			$occupation = $_POST['occupation'];
			$resume = $_POST['resume'];
			$room = $_POST['room'];
			\Models\People::update_($conn, $id, $first_name, $last_name, $email, $occupation, $resume, $room);

			header('Location: person.php?token=' . $token . '&id=' . $id . '&mode=edit');
		} else {
			throw new \UnauthorizedException();
		}
	}
}
new Person;
