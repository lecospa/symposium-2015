<?php
require_once('init.php');
require_once(ROOT . '/models/ispeakers.php');
$smarty->assign('scope', 'ispeakers');

$ispeakers = ISpeakers::all(get_connection());
$smarty->assign('ispeakers', $ispeakers);
$smarty->display('ispeakers.html');
