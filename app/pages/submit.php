<!DOCTYPE HTML>
<html>
  <?php include "../common/common.php";?>
  <?php print_imports($app_directory); ?>
  <body class="no-sidebar">
    <!-- Header -->
    <?php print_header($app_directory); ?>
    <!-- Main -->
    <div id="main-wrapper" style="padding-top:1em;">
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
              <h2 style="margin-left:.25em; margin-top: .25em;" align="center">Submit an idea now!</h2>
              <form  method="post" enctype="multipart/form-data">
	        <p>
		    <b>Title: </b><input id="form_idea_title" type="text" name="title" style="max-width:700px;display: block;margin-left: auto;margin-right: auto;">
	            <b> Description of Idea:</b>
	            <textarea id="form_idea_description" name="text_description" maxlength="1000" style="max-width:700px;display: block;margin-left: auto;margin-right: auto;"></textarea>
            	    <b>Select image to upload:</b> <input type="file" name="fileToUpload" id="fileToUpload">          				
	          </p>
			<button class="submit_buttons"  type="button" name="camper" onclick="check_duplicates()">Check for Duplicates</button>
			<div id="duplicates"><br></div>
			<button class="submit_buttons" type="submit" name="camper" formaction="../page_functions/submit_functions.php">Submit</button>
                </form>
	      </div>	 
	<script>
		function check_duplicates(){
			var idea_title = document.getElementById("form_idea_title").value;
			var idea_description = document.getElementById("form_idea_description").value;
			$.post( "../page_functions/lucene_functions.php", { title: idea_title, description: idea_description })
  				.done(function( data ) {
					document.getElementById("duplicates").innerHTML = data;
  				});
		}	
	</script>
        </div><!--content-->
    </div><!--main_wrapper-->
  </body>
</html>
