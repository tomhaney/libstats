<?php
require_once 'Report.php';

class DataCSVReport extends Report {
    // This class is rather abstract, and its methods
    // are all do-nothing methods.
    // Then again, subclasses aren't that much better...
	
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
		locations.location_name, 
		DATE_FORMAT(questions.date_added, \'%c/%d/%Y %r\') AS added_stamp,
		DATE_FORMAT(questions.date_added, \'%r\') AS question_time,
		CONCAT(
      DATE_FORMAT(question_date + INTERVAL 14 MINUTE, \'%l\'),
      \':\',
      IF((EXTRACT(MINUTE FROM question_date + INTERVAL 14 MINUTE)) < 30, \'00\', \'30\'),
      \' \',
      DATE_FORMAT(question_date + INTERVAL 14 MINUTE, \'%p\')) AS question_half_hour,
		DATE_FORMAT(questions.date_added, \'%c/%d/%Y\') AS question_date,
		DATE_FORMAT(questions.date_added, \'%W\') AS question_weekday,
		questions.initials
		FROM questions 
		JOIN locations ON questions.location_id = locations.location_id
		JOIN question_types ON questions.question_type_id = question_types.question_type_id
		JOIN question_formats ON questions.question_format_id = question_formats.question_format_id
		JOIN patron_types ON questions.patron_type_id = patron_types.patron_type_id
		JOIN time_spent_options ON questions.time_spent_id = time_spent_options.time_spent_id '
		. $sql;

		$result['data'] = $this->db->getAll($fullQuery, $param);

		$result['metadata'] = array_keys($result['data'][0]);
		$result['renderer'] = "template_csv.php";
		return $result;	
	}
	
	function isAuthenticationRequired() {
        return true;
    }
	
}
?>