<?php
namespace API;
require_once('../../init.php');

class PersonFieldController extends \Controllers\APIController {
	public function patch() {
		$this->check('person_field_patch');
		$conn = new \Conn();
		$logger = new \Models\Logging($conn, $_SERVER);
		$person_id = $_GET['person_id'];
		try {
			$valid_fields = array('first_name', 'last_name', 'email', 'occupation', 'resume', 'room');
			foreach ($_POST as $field => $value) {
				if (in_array($field, $valid_fields)) {
					$this->update_field($conn, $person_id, $field, $value);
				}
			}

			$logger->info('person.update', json_encode(array('id' => $id, 'operator' => 'sudo')));
			$this->json(array('status' => 'success'));
		} catch (\PDOException $e) {
			$logger->info('person.update', json_encode(array('id' => $id, 'operator' => 'sudo', 'status' => 'catch_error')));
			$this->json(array('status' => 'error'));
		}
	}
	private function update_field($conn, $person_id, $field, $value) {
		if (($stmt = $conn->prepare("UPDATE `people` SET `" . $field . "`=? WHERE `id`=?")) === false) {
			throw new \PDOException();
		}
		$stmt->execute(array($value, $person_id));
	}
}
new PersonFieldController;
