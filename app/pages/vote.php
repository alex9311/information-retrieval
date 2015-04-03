<!DOCTYPE HTML>
<!--
  Verti by HTML5 UP
  html5up.net | @n33co
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <?php include "../common/common.php";?>
  <?php include "../page_functions/vote_functions.php";?>
  <?php print_imports($app_directory); ?>
  <body class="no-sidebar">
    <!-- Header -->
    <?php print_header($app_directory); ?>
    <!-- Main -->
    <div id="main-wrapper">
        <!-- Content -->
        <div id="content">
        <!-- this is where the content will go -->
          <div id="vote">
		<?php 
			//if the previous idea was sparked, upvote it
			if($_GET["upvote_id"]){ 
				upvote_idea($_GET["upvote_id"]);
			}
			$idea = get_idea($_GET["previous_id"]); 
		?>
            <img class="ui large image vote_image" src="<?php echo substr($idea["image"],13);?>">
            <div class="ui large header" id="text"><?php echo $idea["title"]; ?></div>
            <div class="vote_descrip_text"><p><?php echo $idea["text_description"]; ?></p></div>
            <div id="vote_buttons" style="text-align:center;">
              <div class="ui buttons">
        
                <a href="http://54.93.120.201/alex/project/app/pages/vote.php?previous_id=<?php echo $idea["id"]; ?>&upvote_id=<?php echo $idea["id"];?>">
		  <img src="<?php echo $app_directory.'/images/sparkit_button.png';?>">
		</a>
                <a href="http://54.93.120.201/alex/project/app/pages/vote.php?previous_id=<?php echo $idea["id"]; ?>">
		  <img src="<?php echo $app_directory.'/images/next_button.png';?>">
		</a>
            </div>
          </div>
        </div><!--content-->
    </div><!--main_wrapper-->
  </body>
</html>
