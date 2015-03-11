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
                <form action="" method="post">
                  <label> First Name </label>
                  <input type="text" name="firstname" width="100px;">

                  <label> Last Name </label>
                  <input type="text" name="lastname" width="100px;">

                  <label> Email </label>
                  <input type="text" name="email">

                  <label> Username </label>
                  <input type="text" name="username">

                  <label> Password </label>
                  <input type="password" name="password">
                    
                  <input type="submit" value="Submit" id="submit">
                </form>
              </div><!--envelope-->
            </div><!--class 3u-->
          </div><!--row-->

        </div><!--content-->
      </div><!--container-->
    </div><!--main_wrapper-->
  </body>
</html>
