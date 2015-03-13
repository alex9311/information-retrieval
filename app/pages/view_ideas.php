<!DOCTYPE HTML>
<!--
  Verti by HTML5 UP
  html5up.net | @n33co
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <?php include "../common/common.php";?>
  <?php include "../common/common_functions.php";?>
  <?php include "print_ideas_table.php";?>
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
          <?php print_ideas_table();?>
	

        </div><!--content-->
      </div><!--container-->
    </div><!--main_wrapper-->
  </body>
</html>
<?php
function select_query($sql,$conn){
        if ($result = $conn->query($sql)){
                if(mysqli_num_rows($result) > 0){
                        return $result;
                }else{
                        echo "Sorry, your query returned no rows.";
                        $conn->close();
                        exit();
                }
        }else{
                echo "Sorry, your query has no results";
                $conn->close();
                exit();
        }
}
?>
