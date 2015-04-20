<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	exec('git pull origin master', $output);
	foreach ($output as $line) {
		echo $line."\n";
	}
}
