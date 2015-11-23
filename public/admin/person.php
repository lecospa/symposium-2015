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
			
			$sessions = \Models\Sessions::all($conn);

			$this->smarty->assign('person', $person);
			$this->smarty->assign('talks', $talks);
			$this->smarty->assign('token', $token);
			$this->smarty->assign('sessions', $sessions);
			$this->smarty->display('admin/person.edit.tpl');
		} else {
			throw new \UnauthorizedException();
		}
	}
	public function post() {
		/*$token = $_GET['token'];
		$id = $_GET['id'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$first_name = $_POST['inputfirstname'];
			$last_name = $_POST['inputlastname'];
			$email = $_POST['inputemail'];
			$title = $_POST['inputtitle'];
			$abstract = $_POST['inputabstract'];
			$address_datetime = $_POST['inputaddressdatetime'];
			$talk_time = $_POST['inputtalktime'];
			$occupation = $_POST['inputoccupation'];
			$resume = $_POST['inputresume'];
			$room = $_POST['inputroom'];
			$session_code = $_POST['inputsessioncode'];
			$type = $_POST['inputtype'];
			\Models\People::update_($conn, $id, $first_name, $last_name, $email, $title, $abstract, $address_datetime, $talk_time, $occupation, $resume, $room, $session_code, $type);

			header('Location: edit.php?token=' . $token . '&id=' . $id);
		} else {
			throw new \UnauthorizedException();
		}*/
	}
}
new Person;
