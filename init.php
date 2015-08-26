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

function exception_error_handler($severity, $message, $file, $line) {
	if ($severity == E_ERROR || $severity == E_CORE_ERROR) {
		throw new ErrorException($message, 0, $severity, $file, $line);
	}
}
set_error_handler("exception_error_handler");

class View {
	private function set_smarty() {
		$this->smarty = new Smarty;
		$this->smarty->template_dir = __DIR__ . '/templates/';
		$this->smarty->compile_dir  = __DIR__ . '/templates_c/';
		//$this->smarty->config_dir   = __DIR__ . '/configs/';
		$this->smarty->cache_dir    = __DIR__ . '/cache/';
		$this->smarty->caching      = false;
	}
	private function set_path() {
		$r = substr($_SERVER['SCRIPT_FILENAME'], strlen(__DIR__));
		$uri = $_SERVER['SCRIPT_NAME'];
		$top = substr($uri, 0, strlen($uri) - strlen($r));
		
		define('TOP', $top);
	}
	public function __construct() {
		$this->set_smarty();
		$this->set_path();
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

