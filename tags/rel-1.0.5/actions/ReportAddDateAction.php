<?php
require_once 'Action.php';

class ReportAddDateAction extends Action {
    // Not sure how this is going to work here--EL
 	
    function perform() {
	
    
	// set display requirements
	  $result = array(
      	'renderer' => 'template_renderer.inc',
        'pageTitle' => SITE_NAME .' : Add Date Criteria',
        'content' => 'content/reportFormDate.php');
		
	
	// don't lose the db!	
		$db = $_REQUEST['db'];
	
	// where are we?	
		$userFinder = new UserFinder($db);
        $user = $userFinder->findById($_SESSION['userId']);
		
		$library = $user['library_short_name'];
		$libraryID = $user['library_id'];
		
		$result['library_id'] = $libraryID;
		$result['library'] = $library;
		
		$result['user'] = $user;

		
		$report_id = grwd('report_id');
		$result['report_id'] = $report_id;
		
		
		$reportFinder = new ReportFinder($db);
		$reportCount = $reportFinder->getReportCount();
		$result['reportCount'] = $reportCount;
		
		$result['reportList'] =
            $reportFinder->getChosenReport($report_id);
			
		$libraryFinder = new LibraryFinder($db);
		
		$result['libraryList'] =
			$libraryFinder->getAllLibraries();
		
		$locationFinder = new LocationFinder($db);
		
		$result['locationList'] =
			$locationFinder->getAllLocations();
		
		
				
		return $result;
    }

    function isAuthenticationRequired() {
        return true;
    }
}

?>