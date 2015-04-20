<?php
namespace ISpeaker;
require_once('../init.php');

class Login extends \View {
	function get() {
		if (isset($_GET['token'])) {
			$token = $_GET['token'];
			$mysqli = \db::get();
			$stmt = $mysqli->prepare("SELECT `id`, `email` FROM `ispeakers` WHERE `token`=?");
			$stmt->bind_param("s", $token);
			$stmt->execute();
			$stmt->store_result();
			if ($stmt->num_rows == 1) {
				$stmt->bind_result($id, $email_);
				$stmt->fetch();

				$_SESSION['auth_id'] = $id;
				$_SESSION['user'] = $email;
				$_SESSION['valid'] = true;
				$_SESSION['auth'] = "ispeaker";
			}
			header('location: main.php');
		} else {
			header('location: ../ispeakers.php');
		}
		//$this->smarty->display('ispeaker/login.html');
	}
	function post() {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$mysqli = \db::get();
		$stmt = $mysqli->prepare("SELECT `id`, `email` FROM `ispeakers` WHERE `email`=? AND `password`=?");
		$stmt->bind_param("ss", $email, $password);
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows == 1) {
			$stmt->bind_result($id, $email_);
			$stmt->fetch();

			$_SESSION['auth_id'] = $id;
			$_SESSION['user'] = $email;
			$_SESSION['valid'] = true;
			$_SESSION['auth'] = "ispeaker";
		}
		header('location: main.php');
	}
}
new Login;
