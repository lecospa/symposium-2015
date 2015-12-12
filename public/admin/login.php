<?php
require_once('../../init.php');

class Login extends \Controllers\AdminController {
	public $protected = false;
	public function get() {
		$redirect = $_GET['redirect'];
		$this->smarty->assign('redirect', $redirect);
		$this->smarty->display('admin/login.html');
	}
	public function post() {
		$redirect = $_GET['redirect'];
		
		$user = $_POST['user'];
		$password = $_POST['password'];

		$conn = new \Conn;
		$q = \Models\Query::prepare($conn, "SELECT * FROM `accounts` WHERE `user`=? AND `password`=?");
		$auth = $q->fetch(array($user, $password));
		
		if ($auth === false) {
			$this->smarty->assign('redirect', $redirect);
			$this->smarty->display('admin/login.html');
		} else {
			$q = \Models\Query::prepare($conn, "SELECT * FROM `scopes` WHERE `account_id`=?");
			$_SESSION['scopes'] = array();
			foreach ($q->fetchAll(array($auth['id'])) as $scope) {
				$_SESSION['scopes'][] = $scope['scope'];
			}

			$logger = new \Models\Logging($conn, $_SERVER);
			$logger->info('accounts.login', json_encode(array('id'=> $auth['id'])));

			if ($redirect == '') {
				$redirect = '/admin/index.php';
			}
			header('Location: ' . TOP . $redirect);
		}
	}
}
new Login;
