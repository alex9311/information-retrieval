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
		 <?php
            session_start();
            if(strcmp($_SESSION['POST'], "success")==0){
              echo "image successfully uploaded";
            }
            unset($_SESSION['POST']);
          ?>
          
          <div class="row">
            <div class="8u">
              <h2>Submit an idea now!</h2>
              <div id="envelope">
                <form action="file_upload.php" method="post" enctype="multipart/form-data">  		
					<p>
						<label> Username </label>
							<input type="text" name="username">
						<label> Description of Idea </label>
							<textarea name="text_description" maxlength="140">
                            </textarea>
            			<label> Select image to upload: </label>
            				<input type="file" name="fileToUpload" id="fileToUpload">          				
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
