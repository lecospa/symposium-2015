<?php
require_once('../init.php');

class Update extends \Controllers\APIController {
	public function post() {
		$conn = new \Conn();
		$logging = new \Models\Logging($conn, $_SERVER);

		exec('git pull origin master', $output);
		$logging->info('Update', json_encode(array('output' => $output)));

		$this->json(array('output' => $output));
	}
}
new Update;
