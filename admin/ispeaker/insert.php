<?php
namespace Admin;
require_once('../../init.php');

class IspeakersInsert extends \View {
	public function post() {
		$token = $_GET['token'];
		$auth = \Models\Auth::get(\db::get(), $token);
		if ($auth['scope'] == 'sudo') {
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$email = $_POST['email'];

			if (empty($first_name)) {
				header('Location: ' . TOP . 'admin/index.php?token='.$token);
				return;
			}

			$speaker_id = \Models\ISpeakers::insert(\db::get(), $first_name, $last_name, $email);
			$speaker_token = self::generatorPassword(20);
			
			\Models\Auth::insert(\db::get(), 'ispeakers', $speaker_id, $speaker_token);
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
