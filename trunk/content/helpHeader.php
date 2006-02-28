<div id = "header">
    <div id = "locationInfo">
         <? if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) { ?>
        <div>
        <?=$rInfo['user']['library_full_name']?>
        | <a href="javascript:window.close()">Close</a>
		</div>
		<? } ?>
    </div>
	<h1><?=$rInfo['pageTitle']?></h1>
    <div style = "clear: both;"> </div>
</div>

