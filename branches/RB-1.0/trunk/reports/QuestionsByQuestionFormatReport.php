<?php
require_once 'Report.php';

class QuestionsByQuestionFormatReport extends Report {
    // This class is rather abstract, and its methods
    // are all do-nothing methods.
    // Then again, subclasses aren't that much better...



    function perform($sql, $param) {
	
	// don't lose the db!	
		$db = $_REQUEST['db'];
		$this->db = $db;
		
	// gather $result
		$fullQuery =
		"SELECT COUNT(questions.question) as questions, question_formats.question_format
		FROM questions
		JOIN question_formats ON 
			(questions.question_format_id = question_formats.question_format_id)" .
		$sql .
 		"GROUP BY question_formats.question_format";
		//echo ($fullQuery);
		$result = $this->db->getAll($fullQuery, $param);
			
		return $result;
	}
    
	
	function isAuthenticationRequired() {
        return true;
    }

}
?>
