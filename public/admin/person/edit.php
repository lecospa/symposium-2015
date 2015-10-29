<?php
namespace Admin\People;
require_once('../../../init.php');

class Edit extends \Controllers\Controller {
	public function get() {
		$token = $_GET['token'];
		$id = $_GET['id'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$info = \Models\People::get($conn, $id);

			$sessions = \Models\Sessions::all($conn);
			foreach ($sessions as &$session) {
				$session['title'] = \Models\Sessions::get_property($conn, $session['id'], 'title')['value'];
			}

			$this->smarty->assign('person', $info);
			$this->smarty->assign('token', $token);
			$this->smarty->assign('id', $id);
			$this->smarty->assign('sessions', $sessions);
			$this->smarty->display('admin/person/edit.html');
		} else {
			throw new \UnauthorizedException();
		}
	}
	public function post() {
		$token = $_GET['token'];
		$id = $_GET['id'];
		$conn = new \Conn();
		$auth = \Models\Auth::get($conn, $token);
		if ($auth['scope'] == 'sudo') {
			$first_name = $_POST['inputfirstname'];
			$last_name = $_POST['inputlastname'];
			$email = $_POST['inputemail'];
			$title = $_POST['inputtitle'];
			$abstract = $_POST['inputabstract'];
			$address_datetime = $_POST['inputaddressdatetime'];
			$talk_time = $_POST['inputtalktime'];
			$occupation = $_POST['inputoccupation'];
			$resume = $_POST['inputresume'];
			$room = $_POST['inputroom'];
			$session_code = $_POST['inputsessioncode'];
			$type = $_POST['inputtype'];
			\Models\People::update_($conn, $id, $first_name, $last_name, $email, $title, $abstract, $address_datetime, $talk_time, $occupation, $resume, $room, $session_code, $type);
			\Models\Sessions::delete_property_by_name_value($conn, 'speaker', $id);
			\Models\Sessions::insert_property($conn, $session_code, 'speaker', $id);

			header('Location: edit.php?token=' . $token . '&id=' . $id);
		} else {
			throw new \UnauthorizedException();
		}
	}
}
new Edit;
