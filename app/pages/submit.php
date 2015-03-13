<?php

if($_POST['formSubmit'] == "Submit")
{	
	$valueText = $_POST['text_description'];
	$valueImage = $_POST['image'];
	
	$sql = "INSERT INTO Idea (text_description, image) VALUES ('$valueText', 'valueImage')";
	
	
}
?>



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
      <div class="container">
        <!-- Content -->
        <div id="content">
        <!-- this is where the content will go -->

          <div class="row">
            <div class="8u">
              <h2>Submit now!</h2>
              <div id="envelope">
                <form action="submit.php" method="post">  		
					<p>
						<label> Username </label>
							<input type="text" name="username">
						<label> Description of Idea </label>
							<textarea name="text_description" maxlength="140">
                            </textarea>
						<label> Image (optional) </label>
							<input type="file" name="image">
						</p>
						<p>
						<input type="submit" name="formSubmit" value="Submit">
					</p>
                </form>
              </div><!--envelope-->
            </div><!--class 3u-->
          </div><!--row-->

        </div><!--content-->
      </div><!--container-->
    </div><!--main_wrapper-->
  </body>
</html>
