

<?php

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

	$sql = "SELECT id, text_description, image 
			FROM Idea WHERE id NOT IN (SELECT id_idea from Screening_results)";
        if ($result = $conn->query($sql)){
                if(!(mysqli_num_rows($result) > 0)){
                        echo "Sorry, your query returned no rows.";
                        $conn->close();
                        exit();
                }
        }else{
                echo "Sorry, your query has no results";
                $conn->close();
                exit();
        }
		

	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT']; // $_SERVER['HTTP_HOST']; //$_SERVER['DOCUMENT_ROOT']; 

	$headers = array(  0 => "created" , 1 => "favorite_count" , 2 => "id" , 3 => "image" , 4 => "lang" , 5 => "retweet_count" , 6 => "text" , 7 => "text_description" , 8 => "user" );
	$fp = fopen("/var/www/html/uploads/".'jobdatasanch.csv', 'w');
	fputcsv($fp, $headers);
	while($row = $result->fetch_assoc()) {
		$entry = array(  0 => "" , 1 => "" , 2 => $row["id"] , 3 => $row["image"] , 4 => "" , 5 => "" , 6 => "" , 7 => $row["text_description"] , 8 => "" );
		fputcsv($fp, array_values($entry));
	}
	fclose($fp);
	
	//$file = $DOCUMENT_ROOT.'data/'.'jobdatasanch.csv';
	$file =   "/var/www/html/uploads/".'jobdatasanch.csv';
	//check to make sure the directory where we want to store the file exist and are writable
	if (!file_exists($file)){
		echo 'Upload directory does not exist, contant sys admin';
	}
	if(!is_writable($file)) {
		echo 'Upload directory is not writable, contact sys admin.';
	}
	
	if (file_exists($file)) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($file);
		exit;
	}else{
		echo "NO FILE FOUND!";
	}


?>

