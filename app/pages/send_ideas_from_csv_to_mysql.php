<?php

//this file handles new ideas being submitted 

	//first figure out where the image will be stored and get file type
	$target_dir = "/var/www/html/uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	//check to make sure the directory where we want to store the file exist and are writable
	if (!file_exists($target_dir)){
		echo "Upload directory does not exist, contant sys admin";
	}
	if(!is_writable($target_dir)) {
		echo 'Upload directory is not writable, contact sys admin.';
	}
	echo "hello";

	//now that we know the image is valid, actually try to move the image into the target directory
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		//if successful in storing image, add the idea to the database and return to the submit page!
		echo "Successfully added csv to database!";
		send_data_to_mysql($target_file);
	} else {
		echo "Sorry, there was an error uploading your file.";
	}

?>
<?php
function send_data_to_mysql($filename){
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "Sparked";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

	$handle = fopen($filename, "r");
	$headers = $data = fgetcsv($handle, 5000, ",");
	$idkey = array_search('id', $headers);
	$textkey = array_search('text_description', $headers);
	$acceptedkey = array_search('should_this_idea_be_rejected', $headers);
	while (($data = fgetcsv($handle, 5000, ",")) !== FALSE) {
		$sql = "";
		echo $data[$acceptedkey];
		if($data[$acceptedkey]=="Yes"){
			$accepted = 1;
			//create query string from parameters
			$sql = 'INSERT INTO Screening_results (id_idea, accepted) VALUES ("'.$data[$idkey].'", "'.$accepted.'")';
		}else if($data[$acceptedkey]=="No"){
			$accepted = 0;
			//create query string from parameters
			$sql = 'INSERT INTO Screening_results (id_idea, accepted) VALUES ("'.$data[$idkey].'", "'.$accepted.'")';
		}
		echo "$sql";
		if($sql!==""){
			//and insert!
			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	}
}
?>

