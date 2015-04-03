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


function get_idea($previous_idea_id){
        $conn = connect_db();
	$sql_fields	= "Select Idea.id, Idea.title, Idea.text_description, Idea.image ";
	$sql_join 	= "from Idea inner join Screening_results_crowdflower on Screening_results_crowdflower.id_idea = Idea.id ";
	$sql_where 	= "where Idea.id > ".$previous_idea_id." and Screening_results_crowdflower.accepted = 1 ORDER BY Idea.id ASC LIMIT 1";
	$sql_full = $sql_fields.$sql_join.$sql_where;
	$result = execute_mysql($sql_full,$conn);
	return $result->fetch_assoc();
}

?>
