<? include('mainHeader.php'); ?>
<? $optionFunction = $rInfo['optionFunction']; ?>

<div>
<form name = "questionForm" method = "post" action = "editQuestion.do" 
    id = "qForm">
		
<div id = "toolbar">
    <input type = "hidden" name = "libraryId" 
        value = "<?=$rInfo['question']['library_id']?>" />
    <input type = "hidden" name = "questionId" 
        value = "<?=$rInfo['question']['question_id']?>" />
    <input type = "hidden" name = "origin"
        value = "<?=$rInfo['origin']?>" />
    <div class = "inputBox">
        <h5>Location</h5>
        <?= $optionFunction(
            'location',
            $rInfo['locationOpts'],
            'location_id',
            'location_name',
            $rInfo['question']['location_id'], 5)
            ?>
    </div>
    <div class = "inputBox">
        <h5>Patron Type</h5>
        <?= $optionFunction(
            'patronType',
            $rInfo['patronTypeOpts'],
            'patron_type_id',
            'patron_type',
            $rInfo['question']['patron_type_id'], 5)
            ?>
    </div>
    <div class = "inputBox">
        <h5>Question Type</h5>
        <?= $optionFunction(
            'questionType',
            $rInfo['questionTypeOpts'],
            'question_type_id',
            'question_type',
            $rInfo['question']['question_type_id'], 5)
            ?>
    </div>
    <div class = "inputBox">
        <h5>Time Spent</h5>
        <?= $optionFunction(
            'timeSpent',
            $rInfo['timeSpentOpts'],
            'time_spent_id',
            'time_spent',
            $rInfo['question']['time_spent_id'], 5)
            ?>
    </div>
    <div class = "inputBox">
        <h5>Question Format</h5>
         <?= $optionFunction(
            'questionFormat',
            $rInfo['questionFormatOpts'],
            'question_format_id',
            'question_format',
            $rInfo['question']['question_format_id'], 5)
            ?>
    </div>
    <div class = "inputBox">
        <h5>Initials</h5>
        <input type = "text" size = "5" name = "initials" id = "initials" 
            value = "<?=$rInfo['question']['initials'] ?>" />
    </div>
    <div class = "inputBox">
        <h5>Date</h5>
        <input type = "text" size = "13" name = "questionDate" 
            id = "questionDate"
            class = "validDate" 
            value = "<?=date("n/d/y g:i A", 
                strtotime($rInfo['question']['question_date']))?>" />
    </div>
</div>
<div id = "qBox">
    <h5>Question</h5>
    <textarea name = "question" id = "question" 
    rows = "4"><?=$rInfo['question']['question']?></textarea>
</div>
<div id = "qAnswer">
	<h5>Answer</h5>
	<textarea name = "answer" id = "answer"
	rows = "4"><?=$rInfo['answer']['answer']?></textarea>
</div>
<div style = "clear:both;">
<input type = "submit" name = "saveButton" value = "Save Question / Answer" />
<input type = "submit" name = "deleteButton" value = "Delete" />
</div>
</form>
</div>

<? include 'footer.php'; ?>