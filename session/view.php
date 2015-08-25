<?php
namespace ISpeaker;
require_once('../init.php');

class View extends \View {
	public function get() {
		$conn = new \Conn();
		$id = $_GET['id'];
		$title = \Models\Sessions::get_property($conn, $id, 'title')['value'];

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
		$this->smarty->assign('organizers', $organizers);
		$this->smarty->assign('speakers', $speakers);
		$this->smarty->display('session/view.html');
	}
}
new View;
