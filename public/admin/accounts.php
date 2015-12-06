<?php
require_once('../../init.php');

class Accounts extends \Controllers\AdminController {
	public function get() {
		$this->check('accounts.view');
		$conn = new \Conn();

		$accounts = \Models\Query::prepare($conn, "SELECT `id`, `user` FROM `accounts` ORDER BY `user`")->fetchAll();
		$q = \Models\Query::prepare($conn, "SELECT * FROM `scopes` WHERE `account_id`=? ORDER BY `scope`");
		foreach ($accounts as &$account) {
			$account['scopes'] = $q->fetchAll(array($account['id']));
		}

		$this->smarty->assign('accounts', $accounts);
		$this->smarty->display('admin/accounts.tpl');
	}
}
new Accounts;
