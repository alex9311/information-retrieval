<!DOCTYPE HTML>
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
			$idea = get_idea($_GET["previous_id"],$app_directory); 
			print_idea_for_vote($idea);
		?>
            <div id="vote_buttons" style="text-align:center;">
              <div class="ui buttons">
        
                <a href="<?php echo $app_directory;?>/pages/vote.php?previous_id=<?php echo $idea["id"]; ?>&upvote_id=<?php echo $idea["id"];?>">
		  <img src="<?php echo $app_directory.'/images/sparkit_button.png';?>">
		</a>
                <a href="<?php echo $app_directory;?>/pages/vote.php?previous_id=<?php echo $idea["id"]; ?>">
		  <img src="<?php echo $app_directory.'/images/next_button.png';?>">
		</a>
            </div>
          </div>
        </div><!--content-->
    </div><!--main_wrapper-->
  </body>
</html>
