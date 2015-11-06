<?php
namespace Controllers;

class APIController extends BaseController {
	public function NotFound(\NotFoundException $e) {
		http_response_code(404);
		$this->json(array('error' => 'NotFoundException'));
	}
	public function Unauthorized(\UnauthorizedException $e) {
		http_response_code(401);
		$this->json(array('error' => 'UnauthorizedException'));
	}
	public function Forbidden(\ForbiddenException $e) {
		http_response_code(403);
		$this->json(array('error' => 'ForbiddenException'));
	}
	protected function json($data) {
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($data);
	}
}
