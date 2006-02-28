<?php
require_once 'Report.php';

class QuestionsByTimeOfDayReport extends Report {
    // This class is rather abstract, and its methods
    // are all do-nothing methods.
    // Then again, subclasses aren't that much better...



    function perform($sql, $param) {

	// don't lose the db!	
		$db = $_REQUEST['db'];
		$this->db = $db;
		
	// gather $result
		$fullQuery =
		"SELECT COUNT(question) as question_count, TIME_FORMAT(question_date, '%h-%p') as hour_begin
		FROM questions" .
		$sql.
		"GROUP BY TIME_FORMAT(question_date, '%H-%p') DESC";
		$result = $this->db->getAll($fullQuery, $param);
	
        return $result;
    }

    function isAuthenticationRequired() {
        return true;
    }
	
}
?>