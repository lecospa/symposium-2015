<?php
require_once('init.php');
if ($_POST['submit'] == 'Submit') {
	try {
	} catch (RuntimeException $e) {
	}
} else {
	$smarty->display('registration.html');
}
