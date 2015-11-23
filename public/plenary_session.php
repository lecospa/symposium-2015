<?php
namespace Person;
require_once('../init.php');

class PlenarySession extends \Controllers\Controller {
	public function get() {
		$conn = new \Conn();
		$talk_id = $_GET['talk_id'];

		$talk = \Models\Talks::get($conn, $talk_id);
		if (is_null($talk)) {
			throw new \NotFoundException();
		} else if ($talk['session'] != 'Plenary') {
			throw new \NotFoundException();
		}
		$talk['person'] = \Models\People::get($conn, $talk['person_id']);

		$this->smarty->assign('talk', $talk);
		$this->smarty->display('plenary_session.tpl');
	}
}
new PlenarySession;
