<?php
include "../common/connect.php";

function upvote_idea($idea_id){
	$conn = connect_db();

        $sql = "Select upvotes from Idea where id = ".$idea_id;
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
        while ($row=mysqli_fetch_row($result)){
                $old_upvote = (int)$row[0];
        }


	$new_upvote = $old_upvote +1;

	$sql = "UPDATE Idea SET upvotes='".$new_upvote."' WHERE id=".$idea_id;
	
	// Prepare statement
	$stmt = $conn->prepare($sql);
	
	// execute the query
	$stmt->execute();
	
	// echo a message to say the UPDATE succeeded
	echo $stmt->rowCount() . " records UPDATED successfully";
       	$conn->close();
}

function get_idea($idea_id){
        $conn = connect_db(); 
        // Check connection
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        }

	$sql = "Select id, title, text_description, image from Idea where id = ".$idea_id;
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
	while ($row=mysqli_fetch_row($result)){
		return $row;
	}
}
?>
