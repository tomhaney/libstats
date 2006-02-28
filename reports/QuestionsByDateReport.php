<?php
require_once 'Report.php';

class QuestionsByDateReport extends Report {
    // This class returns its name!  GZAP.

    function perform($sql, $param) {
	
	// don't lose the db!	
		$db = $_REQUEST['db'];
		$this->db = $db;
		
	// gather $result
		$fullQuery =
		"SELECT COUNT(question) as question_count , DAYNAME(question_date) as weekday, DATE_FORMAT(question_date, '%m-%d-%Y') as date
		FROM questions" . 
		$sql .
		'GROUP BY date DESC';
		
		$result = $this->db->getAll($fullQuery, $param);
        return $result;
    }

    function isAuthenticationRequired() {
        return true;
    }
	
}
?>