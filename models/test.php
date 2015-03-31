<?php
require_once('../init.php');
require_once(ROOT . '/models/ispeakers.php');

$mysqli = get_connection();
$data = ISpeakers::all($mysqli);

print_r($data);
