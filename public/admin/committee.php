<?php
require_once('../../init.php');

class Committee extends \Controllers\Controller {
	public function get() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			if ($_GET['mode'] == 'edit') {
				$person_id = $_GET['person_id'];
				$person = \Models\People::get($conn, $person_id);

				$this->smarty->assign('person', $person);
				$this->smarty->assign('token', $token);
				$this->smarty->display('admin/committee.edit.html');
			}
		} else {
			throw new \UnauthorizedException();
		}
	}
	public function patch() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
				$person_id = $_GET['person_id'];
				$first_name = $_POST['first_name'];
				$last_name = $_POST['last_name'];
				$email = $_POST['email'];

				$stmt = $conn->prepare("UPDATE `people` SET `first_name`=?, `last_name`=?, `email`=? WHERE `id`=?");
				$stmt->execute(array($first_name, $last_name, $email, $person_id));
			header('Location: ' . TOP . '/admin/committees.php?token='.$token);
		} else {
			throw new \UnauthorizedException();
		}
	}
	public function post() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$type = $_POST['type'];
			$person_id = $_POST['person_id'];

			$stmt = $conn->prepare("INSERT INTO `committee_person` (`type`, `person_id`) VALUES (?,?)");
			$stmt->execute(array($type, $person_id));
			// TODO: on duplicate key

			header('Location: ' . TOP . '/admin/committees.php?token='.$token);
		} else {
			throw new \UnauthorizedException();
		}
	}
	public function delete() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$type = $_GET['type'];
			$person_id = $_GET['person_id'];

			$stmt = $conn->prepare("DELETE FROM `committee_person` WHERE `type`=? AND `person_id`=?");
			$stmt->execute(array($type, $person_id));

			header('Location: ' . TOP . '/admin/committees.php?token='.$token);
		} else {
			throw new \UnauthorizedException();
		}
	}
}

new Committee;
