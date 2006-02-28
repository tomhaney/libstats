<?php
require_once("../Utils.php");
$myDate = grwd('date');
$goodDate = makeDateSane($myDate);
$parsed = (strtotime($goodDate) > 0) + 0;
?>
var el_id = '<?=$_GET['id']?>';
var unparsedDate = '<?=$myDate?>';
var goodDate = '<?=$goodDate?>';
var parsed = <?=$parsed?>;

if (goodDate == '') {
    $(el_id).style.backgroundColor = '#fff';
} else {    
    if (parsed) {
        $(el_id).value = goodDate;
        new Effect.Highlight(el_id, {startcolor: '#aaeeaa', endcolor: '#ffffff', duration: .5});
    } else {
        $(el_id).style.backgroundColor = '#eaa';
    }
}