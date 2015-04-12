<?php
require_once('../init.php');
require_once(ROOT . '/models/ispeakers.php');
exit();

$mysqli = get_connection();
ISpeakers::update_slide_file($mysqli, 1, "test.pdf");
