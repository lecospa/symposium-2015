<?php
require_once('init.php');
$smarty->assign('opendate', mktime(0, 0, 0, 4, 15, 2015));
$smarty->display('registration.html');
