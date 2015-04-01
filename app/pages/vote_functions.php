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
		$result = "";
		$foundid = false;
		while($foundid == false){
			$sql = "Select id, title, text_description, image from Idea where id = ".$idea_id." LIMIT 1";
			$result = execute_mysql($sql,$conn);
			
			// Check if idea has been accepted by the CrowdFlower sanitation check
			$sql = "SELECT accepted FROM Screening_results_crowdflower WHERE id_idea = ".$idea_id;
			$result2 = execute_mysql($sql,$conn);
			if(mysqli_num_rows($results2) != 0){
				$checkedbycf = $result2->fetch_assoc();
				if($checkedbycf["accepted"]==1){
					$foundid = true;
				}
			}
			// If idea has not been accepted check the next idea;
			$idea_id = $idea_id + 1;
		} 
	return $result->fetch_assoc();
}

?>
