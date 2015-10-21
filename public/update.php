<?php
require_once('../init.php');

class Update extends \Controllers\Controller {
	public function post() {
		$conn = new \Conn();
		$logging = new \Models\Logging($conn, $_SERVER);

		header('Content-Type: text/plain');
		exec('git pull origin master', $output);
		foreach ($output as $line) {
			echo $line."\n";
		}
		$logging->info('Update', json_encode(array('output' => $output)));
	}
}
new Update;
