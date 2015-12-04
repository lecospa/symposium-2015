<?php
error_reporting(E_ALL);
session_start();
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/db.php';

/*
 * 一連串的Exception
 * @TODO 待整理
 */

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

/*
 * 設定這份網站的根目錄絕對路徑，儲存至 const TOP
 */

function set_path() {
	$r = substr($_SERVER['SCRIPT_FILENAME'], strlen(__DIR__ . '/public'));
	$uri = $_SERVER['SCRIPT_NAME'];
	$top = substr($uri, 0, strlen($uri) - strlen($r));
	
	define('TOP', $top);
	define('IMGTOP', '//image.lecospa.mar98.tk/');
}
set_path();

/*
 * 設定smarty，並且讓Controllers取得smarty可用
 */
function get_smarty() {
	$smarty = new Smarty;
	$smarty->template_dir = __DIR__ . '/templates/';
	$smarty->compile_dir  = __DIR__ . '/templates_c/';
	$smarty->cache_dir    = __DIR__ . '/cache/';
	$smarty->caching      = false;
	return $smarty;
}
