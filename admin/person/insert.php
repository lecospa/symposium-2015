<?php
namespace Admin;
require_once('../../init.php');

class PersonInsert extends \View {
	public function post() {
		$token = $_GET['token'];
		$conn = \db::get();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$type = $_POST['type'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$email = $_POST['email'];

			if (empty($first_name)) {
				header('Location: ' . TOP . 'admin/index.php?token='.$token);
				return;
			}
			try {
				$_id = \Models\People::insert(\db::get(), $type, $first_name, $last_name, $email);
			} catch (\Exception $e) {
				echo $e->getMessage();
			}
			$_token = self::generatorPassword(20);
			
			\Models\Auth::insert($conn, 'people', $_id, $_token);
			$conn->close();
			header('Location: ' . TOP . 'admin/index.php?token='.$token);
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


new PersonInsert;
