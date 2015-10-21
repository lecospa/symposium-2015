<?php
namespace Controllers;

class Controller {
	public static $smarty_static;
	public $smarty;
	public function __construct() {
		$this->smarty = self::$smarty_static;
		try {
			/* Implement self define HTTP Method */
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$this->method = 'POST';
				method_exists($this, 'post') && $this->post();
			} else {
				$this->method = 'GET';
				method_exists($this, 'get') && $this->get();
			}
		} catch (NotFoundException $e) {
			http_response_code(404);
			$this->smarty->assign('e', $e);
			$this->smarty->display('404.html');
		} catch (UnauthorizedException $e) {
			http_response_code(401);
			echo 'unauthorized.';
		} catch (ForbiddenException $e) {
			http_response_code(403);
			echo 'forbidden.';
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
}

