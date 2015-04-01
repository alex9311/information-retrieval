<?php
function add_ideas_from_csv_full_mock($filename){
	$app_dir_name = "project";
	$app_pos = strpos(__FILE__, $app_dir_name);
	$path_to_dir= substr(__FILE__,0,$app_pos);
        $target_dir = $path_to_dir."../demo_uploads/csv_files/";

	$handle = fopen($target_dir.$filename, "r");

	$headers = fgetcsv($handle, 5000, ",");
	$title_key	= array_search('title', $headers);
	$description_key= array_search('text_description', $headers);
	$image_key	= array_search('image',$headers);
	
	while (($data = fgetcsv($handle, 5000, ",")) !== FALSE) {
		if($data[0]!=NULL){
			$new_title 	=  $data[$title_key];
			$new_description=  $data[$description_key];
			$new_image 	=  $data[$image_key];
			insert_idea_full_mock($new_title,$new_description,$new_image);
		}
	}
}


function insert_idea_full_mock($title,$text_description,$image){
        $conn =  connect_db();

        $clean_title		= mysqli_real_escape_string($conn,$title);
        $clean_valueText	= mysqli_real_escape_string($conn,$text_description);
        $clean_image_location	= mysqli_real_escape_string($conn,$image);

	$digits = 3;
	$random_upvotes = rand(pow(10, $digits-1), pow(10, $digits)-1);

        $idea_sql = 'INSERT INTO Idea (title, text_description, image, upvotes) VALUES ("'.$clean_title.'", "'.$clean_valueText.'", "'.$clean_image_location.'","'.$random_upvotes.'")';
        if ($conn->query($idea_sql) === TRUE) {
                $new_idea_id = mysqli_insert_id($conn);
		$crowdflower_sql =  'INSERT INTO Screening_results_crowdflower(id_idea, accepted, reason) VALUES("'.$new_idea_id.'", "1", "Seems like a great idea")';
		$conn->query($crowdflower_sql);

		
		mysqli_close($conn);
	}
}

function add_ideas_and_crowdflower_from_csv($ideas_filename,$crowdflower_filename){
        $app_dir_name = "project";
        $app_pos = strpos(__FILE__, $app_dir_name);
        $path_to_dir= substr(__FILE__,0,$app_pos);
        $target_dir = $path_to_dir."../demo_uploads/csv_files/";

        $ideas_handle = fopen($target_dir.$ideas_filename, "r");

        $headers = fgetcsv($ideas_handle, 5000, ",");
        $title_key      = array_search('title', $headers);
        $description_key= array_search('text_description', $headers);
        $image_key      = array_search('image',$headers);
        $id_key      	= array_search('image',$headers);

        while (($data = fgetcsv($ideas_handle, 5000, ",")) !== FALSE) {
                if($data[0]!=NULL){
                        $new_title      =  $data[$title_key];
                        $new_description=  $data[$description_key];
                        $new_image      =  $data[$image_key];
                        $new_id      	=  $data[$id_key];
                        insert_idea($new_title,$new_description,$new_image,$new_id);
                }
        }

        $crowdflower_handle = fopen($target_dir.$crowdflower_filename, "r");

        $headers = fgetcsv($crowdflower_handle, 5000, ",");
        $reason_key     = array_search('reason', $headers);
        $accepted_key	= array_search('accepted', $headers);
        $idea_id_key    = array_search('idea_id',$headers);

        while (($data = fgetcsv($crowdflower_handle, 5000, ",")) !== FALSE) {
                if($data[0]!=NULL){
                        $new_reason     =  $data[$reason_key];
                        $new_accepted	=  $data[$accepted_key];
                        $new_idea_id	=  $data[$idea_id_key];
                        insert_crowdflower_results($new_reason,$new_accepted,$new_idea_id);
                }
        }
}

function insert_idea($title,$text_description,$image, $id){
        $conn =  connect_db();

        $clean_title            = mysqli_real_escape_string($conn,$title);
        $clean_valueText        = mysqli_real_escape_string($conn,$text_description);
        $clean_image_location   = mysqli_real_escape_string($conn,$image);
        $clean_id   = mysqli_real_escape_string($conn,$id);

        $sql = 'INSERT INTO Idea (id,title, text_description, image) VALUES ("'.$clean_id.'", "'.$clean_title.'", "'.$clean_valueText.'", "'.$clean_image_location.'")';
        $conn->query($sql);
	mysqli_close($conn);
}

function insert_crowdflower_results($reason,$accepted,$idea_id){
        $conn =  connect_db();

        $clean_accepted	= mysqli_real_escape_string($conn,$accepted);
        $clean_reason  	= mysqli_real_escape_string($conn,$reason);
        $clean_idea_id  = mysqli_real_escape_string($conn,$idea_id);

	$crowdflower_sql =  'INSERT INTO Screening_results_crowdflower(id_idea, accepted, reason) VALUES("'.$new_idea_id.'", "'.$clean_accepted.'", "'.$clean_reason.'")';
        $conn->query($sql);
        mysqli_close($conn);
}


function connect_db(){
        global $sparked_servername, $sparked_dbname, $sparked_password, $sparked_username;
        $conn = new mysqli($sparked_servername, $sparked_username, $sparked_password, $sparked_dbname);
        // Check connection
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        }
	return $conn;
}
?>

