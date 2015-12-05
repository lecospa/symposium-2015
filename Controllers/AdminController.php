<?php
namespace Controllers;

class AdminController extends Controller {
	public $protected = true;
	
	public function loginUrl() {
		$r = substr($_SERVER['SCRIPT_NAME'], strlen(TOP));
		return TOP . '/admin/login.php?redirect=' . urlencode($r);
	}
	public function logoutUrl() {
		$r = substr($_SERVER['SCRIPT_NAME'], strlen(TOP));
		return TOP . '/admin/logout.php?redirect=' . urlencode($r);
	}
	public function Unauthorized(\UnauthorizedException $e) {
		header('Location: ' . $this->loginUrl());
	}

	private function isLogin() {
		if (isset($_SESSION['scopes']) && is_array($_SESSION['scopes'])) {
			return true;
		} else {
			return false;
		}
	}
	public function check($scope) {
		if ($this->protected) {
			if (!$this->isLogin()) {
				throw new \UnauthorizedException;
			}
			if (!in_array($scope, $_SESSION['scopes'])) {
				throw new \ForbiddenException;
			}
		} else {
			// do nothing
		}
	}
}
