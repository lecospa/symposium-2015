<?php
namespace Models;
/*
 * @param
 * conn: 資料庫連線
 */

class Committees {
	private static $get_people_by_type_q = null;
	static function get_people_by_type($conn, $type) {
		if (is_null(self::$get_people_by_type_q)) {
			self::$get_people_by_type_q = Query::prepare($conn, "SELECT `people`.* FROM `committee_person` LEFT JOIN `people` ON `committee_person`.`person_id` = `people`.`id` WHERE `committee_person`.`type`=? ORDER BY `people`.`last_name` ASC, `people`.`first_name`");
		}
		return self::$get_people_by_type_q->fetchAll(array($type));
	}
}
