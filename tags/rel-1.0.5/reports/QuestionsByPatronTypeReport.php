<?php
require_once 'Report.php';

class QuestionsByPatronTypeReport extends Report {
    // This class is rather abstract, and its methods
    // are all do-nothing methods.
    // Then again, subclasses aren't that much better...



    function perform($sql, $param) {
	
	// don't lose the db!	
		$db = $_REQUEST['db'];
		$this->db = $db;
		
	// gather $result
		$fullQuery =
		"SELECT COUNT(questions.question) as questions, patron_types.patron_type as patrons
		FROM questions
		JOIN patron_types ON 
		(questions.patron_type_id = patron_types.patron_type_id)" .
		$sql .
		"GROUP BY patrons";
	
		$result = $this->db->getAll($fullQuery, $param);
	
        return $result;
    }

    function isAuthenticationRequired() {
        return true;
    }

}
?>