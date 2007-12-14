<?php include('mainHeader.php');?>
<?php
$reportQuestionCount = $rInfo['reportQuestionCount'];
$numberReportQuestionCount = ($reportQuestionCount + 0);
$dateStart = $rInfo['date1'];
$dateStart = (date('m-d-Y',strtotime($dateStart)));
$dateEnd = $rInfo['date2'];
$dateEnd = (date('m-d-Y',strtotime($dateEnd)));

$reports = $rInfo['reportResults'];
if ($_REQUEST['report_id'] == 1) {
	echo ('<h3>' . $rInfo['library_name']);
	if(isset($rInfo['location_name'])){
		echo(' | ' . $rInfo['location_name']);
	}

	echo ('</h3><h3>' . $_REQUEST['report_name'] . ' from ' . $dateStart . ' through ' . $dateEnd . '</h3>');
	// make my report table header...
	echo '<table id= "questionTable">
			<tr>
				<th>Hour Begin TO End</th>
				<th>Question Count</th>
				<th>Percentage</th>
			</tr>';
	// get my report table data...
	$i = 0;
	$count = array();
	$percentage = array();
	echo '<tbody>';
	foreach ($reports as $report) {
		$nextHour = ($report["hour_begin"] + 1);
		if ($nextHour == 13) {
			$nextHour = 1;
		}
		
		echo ('<tr>'.
				'<td>' . $report["hour_begin"] . ' TO ' . $nextHour . '</td>' .
				'<td>' . ($report["question_count"] + 0) . '</td>' .
				'<td>' . round(((($report["question_count"] + 0) / $numberReportQuestionCount)*100), 1) . '%' . '</td>' .
			'</tr>');
		$i++;
		$arrayCount = $i;
		$count[$arrayCount] = $report["question_count"];
		$percentage[$arrayCount] = round(((($report["question_count"] + 0) / $numberReportQuestionCount)*100), 1);	
	}
	echo '</tbody>';
	// total report summary
	$questionSum = array_sum($count);
	$questionPercentage = array_sum($percentage);
	echo ('<tr>' .
			'<td><strong>Totals</strong></td>' .
			'<td><strong>' . $questionSum . '</strong></td>' .
			'<td><strong>' . $questionPercentage . '%' . '</strong></td>' .
	  	'</tr></table>');
}
		
elseif ($_REQUEST['report_id'] == 2) {
	echo ('<h3>' . $rInfo['library_name']);
	if(isset($rInfo['location_name'])){
		echo(' | ' . $rInfo['location_name']);
	}

	echo ('</h3><h3>' . $_REQUEST['report_name'] . ' from ' . $dateStart . ' through ' . $dateEnd . '</h3>');	
	//var_dump($reports);
	// make my report table header...
	echo '<table id= "questionTable">
			<tr>
				<th>Date</th>
				<th>Weekday</th>
				<th>Question Count</th>
				<th>Percentage</th>
			</tr>';
	// get my report table data...	
	$i = 0;	
	$count = array();
	$percentage = array();
	echo '<tbody>';
	foreach ($reports as $report) {
		echo ('<tr>'.
				'<td>' . $report["date"] . '</td>' .
				'<td>' . $report["weekday"] . '</td>' .
				'<td>' . $report["question_count"] . '</td>' .
				'<td>' . round(((($report["question_count"] + 0) / $numberReportQuestionCount)*100), 1) . '%' . '</td>' .
			'</tr>');
		$i++;
		$arrayCount = $i;
		$count[$arrayCount] = $report["question_count"];
		$percentage[$arrayCount] = round(((($report["question_count"] + 0) / $numberReportQuestionCount)*100), 1);		
	}
	echo '</tbody>';
	// total report summary
	$questionSum = array_sum($count);
	$questionPercentage = array_sum($percentage);
	echo ('<tr>' .
			'<td><strong>Totals</strong></td>' .
			'<td><strong>' . $i . '</strong></td>' .
			'<td><strong>' . $questionSum . '</strong></td>' .
			'<td><strong>' . $questionPercentage . '%' . '</strong></td>' .			
	  	'</tr></table>');
}

elseif ($_REQUEST['report_id'] == 3) {
	echo ('<h3>' . $rInfo['library_name']);
	if(isset($rInfo['location_name'])){
		echo(' | ' . $rInfo['location_name']);
	}

	echo ('</h3><h3>' . $_REQUEST['report_name'] . ' from ' . $dateStart . ' through ' . $dateEnd . '</h3>');
	//var_dump($reports);
	// make my report table header...
	echo '<table id= "questionTable">
			<tr>
				<th>Weekday</th>
				<th>Question Count</th>
				<th>Percentage</th>
			</tr>';
	// get my report table data...	
	$i = 0;	
	$count = array();
	$percentage = array();
	echo '<tbody>';
	foreach ($reports as $report) {
		echo ('<tr>'.
				'<td>' . $report["weekday"] . '</td>' .
				'<td>' . $report["question_count"] . '</td>' .
				'<td>' . round(((($report["question_count"] + 0) / $numberReportQuestionCount)*100), 1) . '%' . '</td>' .
			'</tr>');
		$i++;
		$arrayCount = $i;
		$count[$arrayCount] = $report["question_count"];
		$percentage[$arrayCount] = round(((($report["question_count"] + 0) / $numberReportQuestionCount)*100), 1);		
	}
	echo '</tbody>';
	// total report summary
	$questionSum = array_sum($count);
	$questionPercentage = array_sum($percentage);
	echo ('<tr>' .
			'<td><strong>Totals</strong></td>' .
			'<td><strong>' . $questionSum . '</strong></td>' .
			'<td><strong>' . $questionPercentage . '%' . '</strong></td>' .			
	  	'</tr></table>');
}

elseif ($_REQUEST['report_id'] == 4) {
	echo ('<h3>' . $rInfo['library_name']);
	if(isset($rInfo['location_name'])){
		echo(' | ' . $rInfo['location_name']);
	}
	echo ('</h3><h3>' . $_REQUEST['report_name'] . ' from ' . $dateStart . ' through ' . $dateEnd . '</h3>');
	
	// make my report table header...
	echo '<table id= "questionTable">
			<tr>
				<th>Patron Type</th>
				<th>Question Count</th>
				<th>Percentage</th>
			</tr>';
	// get my report table data...
	$i = 0;
	$count = array();
	$percentage = array();
	echo '<tbody>';
	foreach ($reports as $report) {
		
		echo ('<tr>'.
				'<td>' . $report["patrons"] . '</td>' .
				'<td>' . ($report["questions"] + 0) . '</td>' .
				'<td>' . round(((($report["questions"] + 0) / $numberReportQuestionCount)*100), 1) . '%' . '</td>' .
			'</tr>');
		$i++;
		$arrayCount = $i;
		$count[$arrayCount] = $report["questions"];
		$percentage[$arrayCount] = round(((($report["questions"] + 0) / $numberReportQuestionCount)*100), 1);	
	}
	echo '</tbody>';
	// total report summary
	$questionSum = array_sum($count);
	$questionPercentage = array_sum($percentage);
	echo ('<tr>' .
			'<td><strong>Totals</strong></td>' .
			'<td><strong>' . $questionSum . '</strong></td>' .
			'<td><strong>' . $questionPercentage . '%' . '</strong></td>' .
	  	'</tr></table>');
}
	
elseif ($_REQUEST['report_id'] == 6) {
	echo ('<h3>' . $rInfo['library_name']);
	if(isset($rInfo['location_name'])){
		echo(' | ' . $rInfo['location_name']);
	}
	echo ('</h3><h3>' . $_REQUEST['report_name'] . ' from ' . $dateStart . ' through ' . $dateEnd . '</h3>');
	
	// make my report table header...
	echo '<table id= "questionTable">
			<tr>
				<th>Question Format</th>
				<th>Question Count</th>
				<th>Percentage</th>
			</tr>';
	// get my report table data...
	$i = 0;
	$count = array();
	$percentage = array();
	echo '<tbody>';
	foreach ($reports as $report) {
		
		echo ('<tr>'.
				'<td>' . $report["question_format"] . '</td>' .
				'<td>' . ($report["questions"] + 0) . '</td>' .
				'<td>' . round(((($report["questions"] + 0) / $numberReportQuestionCount)*100), 1) . '%' . '</td>' .
			'</tr>');
		$i++;
		$arrayCount = $i;
		$count[$arrayCount] = $report["questions"];
		$percentage[$arrayCount] = round(((($report["questions"] + 0) / $numberReportQuestionCount)*100), 1);	
	}
	echo '</tbody>';
	// total report summary
	$questionSum = array_sum($count);
	$questionPercentage = array_sum($percentage);
	echo ('<tr>' .
			'<td><strong>Totals</strong></td>' .
			'<td><strong>' . $questionSum . '</strong></td>' .
			'<td><strong>' . $questionPercentage . '%' . '</strong></td>' .
	  	'</tr></table>');
}

elseif ($_REQUEST['report_id'] == 7) {
	$library_id_post = $rInfo['library_id_post'];
	$location_id = $rInfo['location_id_post'];
	$stats = new StatisticsReport($db);
	$stats = $stats->perform($rInfo['date1'], $rInfo['date2'], $library_id_post, $location_id, $rInfo['library_name'], $rInfo['location_name'], $_REQUEST['report_name'], $dateStart, $dateEnd);
}

elseif ($_REQUEST['report_id'] == 8) {
	echo ('<h3>' . $rInfo['library_name']);
	if(isset($rInfo['location_name'])){
		echo(' | ' . $rInfo['location_name']);
	}

	echo ('</h3><h3>' . $_REQUEST['report_name'] . ' from ' . $dateStart . ' through ' . $dateEnd . '</h3>');
	echo ("<div id='graph'><img src='test_graph.php'/></div>");
}

?>
<div id="help">
	<a href="help.do?advice=6" class="helpLink" onclick = "showHelp(this.href); return false;">Import Data to Excel</a>
</div>
<?php include 'footer.php'; ?>