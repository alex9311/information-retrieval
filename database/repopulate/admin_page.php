<!DOCTYPE html>
<html>
<body>
<?php
            session_start();
            if($_SESSION['POST']){
              echo '<div style="background-color:#00CCFF">'.$_SESSION['POST']."</div>";
            }
            unset($_SESSION['POST']);
?>
<h3>Upload a new CSV file to be able to use below</h3>
<form action="upload_new_csv.php" method="post" enctype="multipart/form-data">
    Select csv to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload New CSV File" name="submit">
</form>
<h3>Upload a new image to be able to use reference in your repopulated data</h3>
<form action="upload_new_image.php" method="post" enctype="multipart/form-data">
    Select csv to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload New Image" name="submit">
</form>
<br>
<h3>Full Mocked Repopulation</h3>
<p>Select an idea CSV file on the server to repopulate with</p>
<p>This file must have title, text_description, and image. We will mock the crowdflower status and upvotes. See example format below</p>
 <img src="resources/idea_mocked_csv.png" alt="Image Resources" style="max-width:75%;height:auto;">
<br><br>

<form action="repopulate.php" method="post">
	<select  name='csv_file'>
	<?php
	$files = array_map("htmlspecialchars", scandir("toy_data"));

	foreach ($files as $file){
		echo $file;
		if((strcmp($file,".")!=0)&&(strcmp($file,"..")!=0)){
    			echo "<option value='$file'>$file</option>";
		}
	}
	?>
	</select>
    	<input type="submit" value="Repopulate!!" name="submit">
</form>

</body>
</html>
