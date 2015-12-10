<?php
require_once('../../../../init.php');

class SlideShow extends \Controllers\AdminController {
	public function patch() {
		$this->check('slide_patch'); //權限
		$conn = new \Conn(); //宣告一個資料庫查詢的變數
		$person_id = $_GET['person_id']; //從網址讀取person_id
		$talk_id = $_GET['talk_id']; //從網址讀取talk_id
		$slide_file_show = $_POST['slide_file_show']; //接收html或tpl裡的<input name="xx">
		$stmt = $conn->prepare("UPDATE `talks` SET `slide_file_show`=? WHERE `id`=?"); //準備更新資料庫資料表裡的talks 其中id為xx者 令slide_file_show為xx
		$stmt->execute(array($slide_file_show, $talk_id)); //執行上一行 並且把兩個變數填入兩個問號

		header('Location: index.php'); //結束後回到index.php
	}
}

new SlideShow;
