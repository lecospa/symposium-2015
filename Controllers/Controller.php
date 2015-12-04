<?php
namespace Controllers;

class Controller extends BaseController {
	public $smarty;
	public function __construct() {
		$this->smarty = get_smarty();
		parent::__construct();
	}
	public function NotFound(\NotFoundException $e) {
		http_response_code(404);
		$this->smarty->assign('e', $e);
		$this->smarty->display('404.html');
	}
	public function Unauthorized(\UnauthorizedException $e) {
		http_response_code(401);
		echo 'unauthorized.';
	}
	public function Forbidden(\ForbiddenException $e) {
		http_response_code(403);
		echo 'forbidden.';
	}
}
