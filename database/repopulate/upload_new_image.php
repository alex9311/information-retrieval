<?php
$app_dir_name = "project";
$app_pos = strpos(__FILE__, $app_dir_name);
$path_to_dir= substr(__FILE__,0,$app_pos);
include $path_to_dir."../db_creds.php";

if(isset($_POST['submit'])) {
	$target_dir = $path_to_dir."../demo_uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	//check to make sure the directory where we want to store the file exist and are writable
	if (!file_exists($target_dir)){
		return_to_admin('Upload directory does not exist, contant sys admin');
	}
	if(!is_writable($target_dir)) {
		return_to_admin('Upload directory is not writable, contact sys admin.');
	}

	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			$uploadOk = 0;
			return_to_admin("File is not an image.");
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		$uploadOk = 0;
		return_to_admin("Sorry, file already exists.");
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 10000000) {
		$uploadOk = 0;
		return_to_admin("Sorry, your file is too large.");
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		$uploadOk = 0;
		return_to_admin("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
		// Check if image file is a actual image or fake image
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		return_to_admin( "Sorry, file already exists.");
		$uploadOk = 0;
	}
		
	//Check if $uploadOk is set to 0 by an error
	if($uploadOk == 0) {
		return_to_admin( "Sorry, your file was not uploaded.");
	//if everything is ok, try to upload file
	}else{
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			session_start();
			$_SESSION["POST"]= "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			header("Location: admin_page.php");
		}else{
			return_to_admn( "Sorry, there was an error uploading your file.");
		}
	}
}

function return_to_admin($message){
	session_start();
       	$_SESSION["POST"]= "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
       	header("Location: admin_page.php");
}
?>

