<?php
namespace Controllers;

class BaseController {
	public function __construct() {
		try {
			method_exists($this, 'pre_run') && $this->pre_run();

			/* Implement self define HTTP Method */
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				switch ($_REQUEST['method']) {
				case 'delete':
					$this->method = 'DELETE';
					method_exists($this, 'delete') && $this->delete();
					break;
				case 'patch':
					$this->method = 'PATCH';
					method_exists($this, 'patch') && $this->patch();
					break;
				default:
					$this->method = 'POST';
					method_exists($this, 'post') && $this->post();
				}
			} else {
				$this->method = 'GET';
				method_exists($this, 'get') && $this->get();
			}
		} catch (\NotFoundException $e) {
			$this->NotFound($e);
		} catch (\UnauthorizedException $e) {
			$this->Unauthorized($e);
		} catch (\ForbiddenException $e) {
			$this->Forbidden($e);
		}
	}
}

