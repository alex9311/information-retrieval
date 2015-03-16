<?php
include "../common/connect.php";
include "../common/database_functions.php";



function upvote_idea($idea_id){
	$conn = connect_db();
        $sql = "Select upvotes from Idea where id = ".$idea_id." LIMIT 1";
	$result = execute_mysql($sql,$conn);

	$old_upvote = $result->fetch_assoc();

	$new_upvote = (int)($old_upvote["upvotes"]) +1;

	$sql = "UPDATE Idea SET upvotes='".$new_upvote."' WHERE id=".$idea_id;
	
	// Prepare statement
	$stmt = $conn->prepare($sql);
	
	$stmt->execute();
       	$conn->close();
}

function get_idea($idea_id){
        $conn = connect_db();
        // Check connection
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        }

        $sql = "Select id, title, text_description, image from Idea where id = ".$idea_id." LIMIT 1";
        $result = execute_mysql($sql,$conn);
	
	return $result->fetch_assoc();
}

?>
