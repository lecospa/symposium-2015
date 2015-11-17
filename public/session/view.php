<?php
namespace ISpeaker;
require_once('../../init.php');

class View extends \Controllers\Controller {
	public function get() {
		$conn = new \Conn();
		$id = $_GET['id'];
		$title = \Models\Sessions::get_property($conn, $id, 'title')['value'];
		$abbreviation = \Models\Sessions::get_property($conn, $id, 'abbreviation')['value'];
		$location = \Models\Sessions::get_property($conn, $id, 'location')['value'];
		$date = \Models\Sessions::get_property($conn, $id, 'date')['value'];
		$time = \Models\Sessions::get_property($conn, $id, 'time')['value'];

		$organizers = array();
		$os = \Models\Sessions::get_properties($conn, $id, 'organizer');
		foreach($os as $o) {
			$organizers[] = \Models\People::get($conn, $o['value']);
		}
		
		$speakers = array();
		$os = \Models\Sessions::get_properties($conn, $id, 'speaker');
		foreach($os as $o) {
			$speakers[] = \Models\People::get($conn, $o['value']);
		}

		$this->smarty->assign('title', $title);
		$this->smarty->assign('abbreviation', $abbreviation);
		$this->smarty->assign('location', $location);
		$this->smarty->assign('date', $date);
		$this->smarty->assign('time', $time);
		$this->smarty->assign('organizers', $organizers);
		$this->smarty->assign('speakers', $speakers);
		$this->smarty->display('session/view.html');
	}
}
new View;
