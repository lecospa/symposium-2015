<?php
require_once('../init.php');
require_once(ROOT.'/models/ispeakers.php');

if ($_SESSION['valid'] == true) {
	$info = ISpeakers::get(get_connection(), $_SESSION['auth_id']);
	$smarty->assign('ispeaker', $info);

	$smarty->display('ispeaker/main.html');
} else {
	header('location: login.php');
}
