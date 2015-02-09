<?php
require_once('libs/Smarty.class.php');
$smarty = new Smarty;

$smarty->caching = true;
$smarty->display('index.tpl');
