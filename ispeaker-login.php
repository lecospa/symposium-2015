<?php
session_start();

if ($_POST['submit'] == 'submit') {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$mysqli = new mysqli('localhost', 'symposium_2015', 'Wwz6wPFeyq2AsueK', 'symposium_2015');
	if ($mysqli->connect_error) {
		die('connect error');
	}

	$stmt = $mysqli->prepare("SELECT `email` FROM `ispeakers` WHERE `email`=? AND `password`=?");
	$stmt->bind_param("ss", $email, $password);
	$stmt->execute();
	$stmt->store_result();

	if ($stmt->num_rows == 1) {
		$_SESSION['user'] = $email;
		$_SESSION['valid'] = true;
		$_SESSION['auth'] = "ispeaker";
	}
	header('location: done.php');

} else {
	require_once('libs/Smarty.class.php');
	$smarty = new Smarty;

	$smarty->caching = true;
	$smarty->display('ispeaker/login.html');
}
