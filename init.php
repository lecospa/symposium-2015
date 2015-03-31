<?php
session_start();
define('ROOT', __DIR__);

/*
 * Database
 */
require_once(ROOT . '/db.php');

/*
 * Smarty
 */
require_once(ROOT . '/libs/Smarty.class.php');
$smarty = new Smarty;

$smarty->template_dir = ROOT . '/templates/';
$smarty->compile_dir  = ROOT . '/templates_c/';
//$smarty->config_dir   = ROOT . '/configs/';
$smarty->cache_dir    = ROOT . '/cache/';
$smarty->caching = true;

