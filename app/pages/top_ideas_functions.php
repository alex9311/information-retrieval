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

function get_top_ideas(){
	$conn = connect_db();
	$sql = "Select id, title,text_description,image,upvotes from Idea ORDER BY upvotes LIMIT 5";
        $result = execute_mysql($sql,$conn);
	echo '<table border="1">';
        echo' <tr><td>Title</td><td>Desciption</td></td></thead>';
        while($row = $result->fetch_assoc()) {
                echo '<tr>';
               	echo '<td>'.$row["title"]."</td>";
               	echo '<td>'.$row["text_description"]."</td>";
                echo '</tr>';
        }
	echo '</table>';
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
