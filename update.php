<?php
echo "<pre>";
exec('git pull origin master', $output);
foreach ($output as $line) {
	echo $line."\n";
}
echo "</pre>";
