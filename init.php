<?php
error_reporting(E_ALL);
session_start();
define('ROOT', __DIR__);
require_once(ROOT . '/db.php');
require_once(ROOT . '/libs/Smarty.class.php');

function my_autoloader($class) {
	include(strtolower(str_replace("\\", "/", $class)) . '.php');
}
spl_autoload_register('my_autoloader');

/*
 * Web path
 */
if (__DIR__ == '/var/www/lecospa.test.mar98.tk') {
	define('TOP', 'http://lecospa.test.mar98.tk/');
} else if (__DIR__ == '/var/www/lecospa_dev.test.mar98.tk') {
	define('TOP', 'http://lecospa_dev.test.mar98.tk/');
} else if (__DIR__ == '/var/www/lecospa.brtsi.twbbs.org') {
	define('TOP', 'http://lecospa.brtsi.twbbs.org/');
} else {
	define('TOP', 'http://lecospa.ntu.edu.tw/symposium/2015/');
}

class UnauthorizedException extends Exception {
	public function __construct($message, $code = 0, Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}
}
class ForbiddenException extends Exception {
	public function __construct($message, $code = 0, Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}
}
class NotFoundException extends Exception {
	public function __construct($message, $code = 0, Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}
}

class View {
	function set_smarty() {
		$this->smarty = new Smarty;
		$this->smarty->template_dir = ROOT . '/templates/';
		$this->smarty->compile_dir  = ROOT . '/templates_c/';
		//$this->smarty->config_dir   = ROOT . '/configs/';
		$this->smarty->cache_dir    = ROOT . '/cache/';
		$this->smarty->caching = false;
	}
	function View() {
		$this->set_smarty();
		try {
			/* Implement self define HTTP Method */
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$this->method = 'POST';
				method_exists($this, 'post') && $this->post();
			} else {
				$this->method = 'GET';
				method_exists($this, 'get') && $this->get();
			}
		} catch (NotFoundException $e) {
			http_response_code(404);
			$this->smarty->assign('e', $e);
			$this->smarty->display('404.html');
		} catch (UnauthorizedException $e) {
			http_response_code(401);
			echo 'unauthorized.';
		} catch (ForbiddenException $e) {
			http_response_code(403);
			echo 'forbidden.';
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
}

function exception_error_handler($severity, $message, $file, $line) {
	/*if (!(error_reporting() & $severity)) {
		return;
	}*/
	if ($severity == E_ERROR || $severity == E_CORE_ERROR) {
		throw new ErrorException($message, 0, $severity, $file, $line);
	}
}
set_error_handler("exception_error_handler");
