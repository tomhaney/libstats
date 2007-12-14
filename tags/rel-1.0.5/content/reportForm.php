<?php include('mainHeader.php'); ?>
<h3>Please choose from these <?php echo $rInfo['reportCount'] ?> reports.</h3>
<?php
$reports = $rInfo['reportList'];
for ($i = 1; $i <= count($reports); $i++) {
    $report = $reports[$i-1]
?>
<div class="report">
    <h3><?php echo($i); ?> <a href="reportAddDate.do?&amp;report_id=<?php echo($report["report_id"]); ?>"/><?php echo($report["report_name"]); ?></a></h3>
    <div><?php echo($report["report_description"]); ?></div>

</div>
<?php } ?>

<?php include 'footer.php'; ?>

