<!DOCTYPE HTML>
<!--
  Verti by HTML5 UP
  html5up.net | @n33co
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <?php include "common/common.php";?>
  <?php include "common/common_functions.php";?>
  <?php print_imports($app_directory); ?>
  <body class="no-sidebar">
    <!-- Header -->
    <?php print_header($app_directory); ?>
    <!-- Banner -->
    <div id="banner-wrapper">
      <div id="banner" class="box container">
        <div class="row">
          <div class="7u">
            <h2>Spark your ideas!</h2>
            <p>Get your ideas developed.</p>
          </div><!--7u-->
          <div class="5u">
            <ul>
              <li><a href="<?php echo $app_directory; ?>/pages/vote.php" class="button big icon fa-arrow-circle-right">Vote!</a></li>
              <li><a href="<?php echo $app_directory; ?>/pages/submit.php" class="button big icon fa-arrow-circle-left">Submit!</a></li>
            </ul>
          </div><!--5u-->
        </div><!--row-->
      </div><!--box container-->
    </div><!--banner-wrapper-->
    <div id="main-wrapper">
    </div>
  </body>
</html>
