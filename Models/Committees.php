<?php
namespace Models;
/*
 * @param
 * conn: 資料庫連線
 */

class Committees {
	private static $get_people_by_id_q = null;
	/*
	 * 取得某`type`的所有`people`
	 */
	static function get_people_by_id($conn, $id) {
		if (is_null(self::$get_people_by_id_q)) {
			self::$get_people_by_id_q = Query::prepare($conn, "SELECT `people`.* FROM `committee_person` LEFT JOIN `people` ON `committee_person`.`person_id` = `people`.`id` WHERE `committee_person`.`committee_id`=? ORDER BY `people`.`last_name` ASC, `people`.`first_name`");
		}
		return self::$get_people_by_id_q->fetchAll(array($id));
	}
	/*
	 * insert a person with given type as committee
	 */
	static function insert_person($conn, $committee_id, $person_id) {
		$q = Query::prepare($conn, "INSERT INTO `committee_person` (`committee_id`, `person_id`) VALUES (?,?)");
		$q->execute(array($committee_id, $person_id));
	}
}
