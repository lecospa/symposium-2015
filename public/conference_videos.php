<?php
require_once('../init.php');
class ConferenceVideos extends \Controllers\Controller {
	function get() {
		$this->smarty->assign('scope', __CLASS__);
		$this->smarty->display('conference_videos.html');
	}
}
new ConferenceVideos;
