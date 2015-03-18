<!DOCTYPE HTML>
<!--
  Verti by HTML5 UP
  html5up.net | @n33co
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <?php include "../common/common.php";?>
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
	    <div id="submitting">
              <h2 style="margin-left:.25em; margin-top: .25em;">Submit an idea now!</h2>
              <form action="submit_functions.php" method="post" enctype="multipart/form-data">
	        <p>
		    <label> Title </label>
		    <input type="text" name="title">
	            <label> Description of Idea </label>
	            <textarea name="text_description" maxlength="140"></textarea>
            	    <label> Select image to upload: </label>
            	    <input type="file" name="fileToUpload" id="fileToUpload">          				
	          </p>
		  <p>
		    <input type="submit" name="formSubmit" value="Submit">
	          </p>
                </form>
	      </div>	 

        </div><!--content-->
    </div><!--main_wrapper-->
  </body>
</html>
