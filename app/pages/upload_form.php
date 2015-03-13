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
          <?php
            session_start();
            if(strcmp($_SESSION['POST'], "success")==0){
              echo "image successfully uploaded";
            }
            unset($_SESSION['POST']);
          ?>
          <form action="file_upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
          </form>

        </div><!--content-->
      </div><!--container-->
    </div><!--main_wrapper-->
  </body>
</html>
