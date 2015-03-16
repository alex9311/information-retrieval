<!DOCTYPE HTML>
<!--
  Verti by HTML5 UP
  html5up.net | @n33co
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <?php include "../common/common.php";?>
  <?php include "../common/common_functions.php";?>
  <?php include "get_idea.php";?>
  <?php print_imports($app_directory); ?>
  <body class="no-sidebar">
    <!-- Header -->
    <?php print_header($app_directory); ?>
    <!-- Main -->
    <div id="main-wrapper">
      <div class="container">
        <!-- Content -->
        <div id="content">
        <!-- this is where the content will go -->
          <div id="vote">
		<?php $idea = get_idea($_GET["id"]);?>
            <img class="ui large circular image" src="<?php echo substr($idea[3],13);?>">
            <div class="ui large header" id="text"><?php echo $idea[2]; ?></div>
            <p><?php echo $idea[1]; ?></p>
            <div id="button_holder">
              <div class="ui buttons">
        
                <a href="http://54.93.120.201/alex/project/app/pages/vote.php?id=<?php echo ((int)$_GET["id"])+1; ?>">
		  <div class="ui positive button">Spark it!</div>
		</a>
                <div class="or"></div>
                <a href="http://54.93.120.201/alex/project/app/pages/vote.php?id=<?php echo ((int)$_GET["id"])+1; ?>">
                  <div class="ui red right labeled icon button">
                    <i class="right arrow icon"></i>
                      Next
                  </div>
		</a>
        
              </div>
            </div>
          </div>
        </div><!--content-->
      </div><!--container-->
    </div><!--main_wrapper-->
  </body>
</html>
