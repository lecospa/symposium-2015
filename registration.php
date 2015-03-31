<?php
if ($_POST['submit'] == 'Submit') {
	try {
	} catch (RuntimeException $e) {
	}
} else {
	require_once('libs/Smarty.class.php');
	$smarty = new Smarty;

	$smarty->caching = true;
	$smarty->display('registration.html');
}
