<?php
require_once('init.php');
class Social extends View {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('social_national_palace_museum.html');
	}
}
new Social;