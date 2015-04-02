<?php
$app_dir_name = "project";
$app_pos = strpos(__FILE__, $app_dir_name);
$path_to_dir= substr(__FILE__,0,$app_pos);
include $path_to_dir."../db_creds.php";

if(isset($_POST['submit'])) {
	$target_dir = $path_to_dir."../demo_uploads/csv_files/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	echo $target_file;
	$uploadOk = 1;
	$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	
	//Allow certain file formats
	if ($fileType != "csv") {
		echo "Sorry, only CSV";
		$uploadOk = 0;
	}
		
	//Check if $uploadOk is set to 0 by an error
	if($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	//if everything is ok, try to upload file
	}else{
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			session_start();
			$_SESSION["POST"]= "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			header("Location: admin_page.php");
		}else{
			echo "Sorry, there was an error uploading your file.";
		}
	}
}
?>

