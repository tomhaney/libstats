<div id = "header">
    <div id = "locationInfo">
         <? if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) { ?>
        <div>
        <?=$rInfo['user']['library_full_name'];
		if($rInfo['user']['admin'] == 1){
			echo(' | <a href="libraryAdminForm.do">Admin</a>');
		}				
		?>
         | <?= implode(' | ', $rInfo['taskLinks']) ?>
		</div>
		 <form name = "searchForm" action = "search.do" method = "get">
            <div>Quick Search:
            <input type = "text" size = "20" name = "criteria">
            <input type = "submit" name = "searchButton" value = "Go">
			<input type = "hidden" name = "origin"
				value = "<?=$rInfo['origin']?>" /> |
            <a href = "advancedSearchForm.do<?php if (isset($rInfo['advanced_search_string'])) { echo "?".$rInfo['advanced_search_string']; } ?>">
            Advanced Search</a>
            </div>
         </form>
         <? } ?>
    </div>
	<h1><?=$rInfo['pageTitle']?></h1>
    <div style = "clear: both;"> </div>
</div>

