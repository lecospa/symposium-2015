<?php
namespace Controllers;

class AdminController extends Controller {
	// 定義頁面是否需要登入後才能存取
	public $protected = true;
	// 產生登入網址
	public function loginUrl() {
		$r = substr($_SERVER['SCRIPT_NAME'], strlen(TOP));
		return TOP . '/admin/login.php?redirect=' . urlencode($r);
	}
	// 產生登出網址
	public function logoutUrl() {
		$r = substr($_SERVER['SCRIPT_NAME'], strlen(TOP));
		return TOP . '/admin/logout.php?redirect=' . urlencode($r);
	}
	// 將未登入的轉往登入網址
	public function Unauthorized(\UnauthorizedException $e) {
		header('Location: ' . $this->loginUrl());
	}
	// 檢查是否登入
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
