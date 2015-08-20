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
} else if (__DIR__ == '/home/ycchen/public_html/symposium-2015') {
	define('TOP', 'http://nas.mar98.tk/~ycchen/symposium-2015/');
} else {
	define('TOP', 'http://lecospa.ntu.edu.tw/symposium/2015/');
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

		/* Implement self define HTTP Method */
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			try {
				$this->method = 'POST';
				method_exists($this, 'post') && $this->post();
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		} else {
			try {
				$this->method = 'GET';
				method_exists($this, 'get') && $this->get();
			} catch (Exception $e) {
				echo $e->getMessage();
			}
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
