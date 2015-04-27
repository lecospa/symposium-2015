<?php
namespace Admin;
require_once('../init.php');

class IspeakersInsert extends \View {
	public function post() {
		$token = $_GET['token'];
		$auth = \Models\Auth::get(\db::get(), $token);
		if ($auth['scope'] == 'sudo') {
			$name = $_POST['name'];
			$email = $_POST['email'];

			if (empty($name)) {
				header('Location: ' . TOP . 'admin/index.php?token='.$token);
				return;
			}
			
			$id = \Models\ISpeakers::insert(\db::get(), $name, $email);
			$token = self::generatorPassword(20);
			
			\Models\Auth::insert(\db::get(), 'ispeakers', $id, $token);
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


new IspeakersInsert;
