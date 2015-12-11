<?php
require_once('../../../../init.php');

class SlideShow extends \Controllers\AdminController {
	public function patch() {
		//權限
		$this->check('slide_patch');
		//宣告一個資料庫連線的變數
		$conn = new \Conn();
		//從網址讀取person_id
		$person_id = $_GET['person_id']; 
		//從網址讀取talk_id
		$talk_id = $_GET['talk_id']; 
		//接收html或tpl裡的<name="xx">
		$slide_file_show = $_POST['slide_file_show'];
		//準備更新資料庫資料表裡的talks 其中id為xx者 令slide_file_show為xx
		$stmt = $conn->prepare("UPDATE `talks` SET `slide_file_show`=? WHERE `id`=?");
		//執行上一行 並且把兩個變數填入兩個問號
		$stmt->execute(array($slide_file_show, $talk_id));
		
		//結束後回到原本的頁面.php
		header(sprintf("location: %s/admin/person.php?id=%d&mode=edit",TOP, urlencode($person_id), urlencode($talk_id)));
	}
}

new SlideShow;
