<?php
include "../common/database_functions.php";

function get_idea($idea_id){
        $conn = connect_db();
	$sql = "Select id, title, text_description, image from Idea where id = ".$idea_id." LIMIT 1";
	$result = execute_mysql($sql,$conn);
	return $result->fetch_assoc();
}

?>
