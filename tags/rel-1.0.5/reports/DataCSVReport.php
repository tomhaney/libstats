<?php
require_once 'Report.php';

class DataCSVReport extends Report {
	
	function perform($sql, $param) {

		// don't lose the db!	
		$db = $_REQUEST['db'];
		$this->db = $db;

		
		$fullQuery =
		'SELECT 
		questions.question_id, 
		patron_types.patron_type, 
		question_types.question_type, 
		time_spent_options.time_spent, 
		question_formats.question_format,
		libraries.short_name as library_name,
		locations.location_name, 
		DATE_FORMAT(questions.date_added, \'%c/%d/%Y %r\') AS added_stamp,
		DATE_FORMAT(questions.question_date, \'%c/%d/%Y %r\') AS asked_at,
		DATE_FORMAT(questions.question_date, \'%r\') AS question_time,
		CONCAT(
      DATE_FORMAT(question_date + INTERVAL 14 MINUTE, \'%l\'),
      \':\',
      IF((EXTRACT(MINUTE FROM question_date + INTERVAL 14 MINUTE)) < 30, \'00\', \'30\'),
      \' \',
      DATE_FORMAT(question_date + INTERVAL 14 MINUTE, \'%p\')) AS question_half_hour,
		DATE_FORMAT(questions.question_date, \'%c/%d/%Y\') AS question_date,
		DATE_FORMAT(questions.question_date, \'%W\') AS question_weekday,
		questions.initials
		FROM questions 
		JOIN libraries ON questions.library_id = libraries.library_id
		JOIN locations ON questions.location_id = locations.location_id
		JOIN question_types ON questions.question_type_id = question_types.question_type_id
		JOIN question_formats ON questions.question_format_id = question_formats.question_format_id
		JOIN patron_types ON questions.patron_type_id = patron_types.patron_type_id
		JOIN time_spent_options ON questions.time_spent_id = time_spent_options.time_spent_id '
		. $sql;
    
		$result['data'] = $this->db->getAll($fullQuery, $param);

		$result['metadata'] = array_keys($result['data'][0]);
		$result['renderer'] = "template_csv.inc";
		return $result;	
	}
	
	function isAuthenticationRequired() {
        return true;
    }
	
}
?>