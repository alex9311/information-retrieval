<?php

include "../common/connect.php";

//this file handles new ideas being submitted 

//only want to execute all these checks if we have a submission request
if($_POST['formSubmit'] == "Submit"){	
	//first figure out where the image will be stored and get file type
	$target_dir = "/var/www/html/uploads/";
	$digits = 4;
	$image_prefix = rand(pow(10, $digits-1), pow(10, $digits)-1);
	$target_file = $target_dir . $image_prefix. basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	//check to make sure the directory where we want to store the file exist and are writable
	if (!file_exists($target_dir)){
		return_to_submit_page('Upload directory does not exist, contant sys admin');
	}
	if(!is_writable($target_dir)) {
		return_to_submit_page('Upload directory is not writable, contact sys admin.');
	}

	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    	if($check !== false) {
	        	$uploadOk = 1;
	    	} else {
	        	$uploadOk = 0;
	        	return_to_submit_page("File is not an image.");
	    	}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    	$uploadOk = 0;
	    	return_to_submit_page("Sorry, file already exists.");
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 10000000) {
	    	$uploadOk = 0;
	    	return_to_submit_page("Sorry, your file is too large.");
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
	    	$uploadOk = 0;
	    	return_to_submit_page("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
	}

	//now that we know the image is valid, actually try to move the image into the target directory
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		//if successful in storing image, add the idea to the database and return to the submit page!
		insert_idea($_POST['title'],$_POST['text_description'],$target_file);
	} else {
		return_to_submit_page("Sorry, there was an error uploading your file.");
	}
}

function insert_idea($title,$valueText,$image_location){
	$conn =  connect_db();
	//create query string from parameters
	$clean_title=mysqli_real_escape_string($conn,$title);
	$clean_valueText=mysqli_real_escape_string($conn,$valueText);
	$clean_image_location=mysqli_real_escape_string($conn,$image_location);
        $sql = 'INSERT INTO Idea (title, text_description, image) VALUES ("'.$clean_title.'", "'.$clean_valueText.'", "'.$clean_image_location.'")';

	//and insert!
	if ($conn->query($sql) === TRUE) {
		//get the id of the idea that was just inserted
		$new_idea_id = mysqli_insert_id($conn);
		//send data to CrowdFlower job
		$clean_image_location = $_SERVER[HTTP_HOST]."/".substr($clean_image_location,14);
		$entry = array(  "created" => "" , "favorite_count" => "" , "id" => $new_idea_id , 
						"image" => $clean_image_location , "lang" => "" , "retweet_count" => "" , 
						"text" => "" , "text_description" => $clean_valueText , 
						"title" => $clean_title ,"user" => "" );
		sendToCrowdflower($entry);
		
		return_to_submit_page("Successfully added idea to database!");
       	} else {
		return_to_submit_page("Error: " . $sql . "<br>" . $conn->error);
       	}
}

function sendToCrowdflower($entry){
	$api_key = "vREt_GNtauNnKc3y1JXX";
	$job_id = "705775";
	$data = array("data" => $entry);
	$payload = array("key" => $api_key, "unit" => $data);
	$input = json_encode($payload);
	$headers = array('Accept: application/json','Content-Type: application/json'); 
	$url = "http://api.crowdflower.com/v1/jobs/$job_id/units.json?key=$api_key";
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $input);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	$response = curl_exec($ch);
	if ($response === FALSE) {
		die("Curl failed: " . curl_error($ch));
	}
	curl_close($ch);
}

function return_to_submit_page($status){
	session_start();
       	$_SESSION["POST"] = $status;
       	header("Location: submit.php");
       	exit();
}
?>
