<?php
exec('git pull origin master', $output);
foreach ($output as $line) {
	echo $line."\n";
}
