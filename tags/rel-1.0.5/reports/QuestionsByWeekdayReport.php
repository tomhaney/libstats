<?php
require_once 'Report.php';

class QuestionsByWeekdayReport extends Report {
    // This class is rather abstract, and its methods
    // are all do-nothing methods.
    // Then again, subclasses aren't that much better...

    function perform($sql, $param) {
	
	// don't lose the db!	
		$db = $_REQUEST['db'];
		$this->db = $db;
		
	// gather $result
		$fullQuery =
		"SELECT COUNT(question) as question_count , DAYNAME(question_date) as weekday
		FROM questions" .
		$sql .
		"GROUP BY weekday DESC
		ORDER BY DATE_FORMAT(question_date, '%w')";
        		
		$result = $this->db->getAll($fullQuery, $param);
	
        return $result;
    }

    function isAuthenticationRequired() {
        return true;
    }

}
?>