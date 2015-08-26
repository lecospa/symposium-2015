<?php
namespace Admin\Person;
require_once('../../init.php');

class Insert extends \View {
	public function post() {
		$token = $_GET['token'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$type = $_POST['type'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$email = $_POST['email'];

			if (empty($first_name) || empty($last_name)) {
				header('Location: ' . TOP . '/admin/people.php?token='.$token);
				return;
			}
			$_id = \Models\People::insert($conn, $type, $first_name, $last_name, $email);
			$_token = self::generatorPassword(8);
			
			\Models\Auth::insert($conn, 'people', $_id, $_token);
			header('Location: ' . TOP . '/admin/people.php?token='.$token);
		} else {
			throw new \UnauthorizedException();
		}
	}
	private function generatorPassword($password_len) {
		$password = '';
		$word = 'abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ23456789';
		$len = strlen($word);
		for ($i = 0; $i < $password_len; $i++) {
			$password .= $word[rand() % $len];
		}
		return $password;
	}
}


new Insert;
