<!DOCTYPE HTML>
<!--
  Verti by HTML5 UP
  html5up.net | @n33co
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <?php include "../common/common.php";?>
  <?php include "../common/common_functions.php";?>
  <?php print_imports($app_directory); ?>
  <body class="no-sidebar">
    <!-- Header -->
    <?php print_header($app_directory); ?>
    <!-- Main -->
    <div id="main-wrapper">
        <!-- Content -->
        <div id="content">
        <!-- this is where the content will go -->
		<?php
        session_start();
        if($_SESSION['POST']){
			echo $_SESSION['POST']; 
        }
        unset($_SESSION['POST']);
        ?>
		<form method="post" action="send_ideas_from_mysql_to_csv.php">
		<p>
		<input type="submit" value="Get CSV of Ideas not vetted">
		</p>
		</form>
		<form method="post" action="send_ideas_from_csv_to_mysql.php" enctype="multipart/form-data">
		<p>
            <label> Select csv with CrowdFlower results: </label>
            <input type="file" name="fileToUpload" id="fileToUpload">          				
	    </p>
		<p>
		<input type="submit" value="Send Results from CrowdFlower to Database">
		</p>
		</form>
        </div><!--content-->
    </div><!--main_wrapper-->
  </body>
</html>
