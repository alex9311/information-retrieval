<?php
include "../common/connect.php";
include "../common/database_functions.php";



function get_top_ideas($app_directory){
	$conn = connect_db();
	$sql = "Select id, title,text_description,image,upvotes from Idea ORDER BY upvotes LIMIT 5";
        $result = execute_mysql($sql,$conn);
	echo '<table border="1" id="top-5-table">';
        echo' <tr><td>Rank</td><td>Title</td></tr></thead>';
	$rank = 1;
        while($row = $result->fetch_assoc()) {
		$title = $row["title"];
		$id = $row["id"];
                echo '<tr>';
		echo '<td>'.$rank."</td>";
               	echo '<td><a href="'.$app_directory.'/pages/idea.php/?id='.$id.'">'.$title."</a></td>";
		echo '</tr>';
		$rank = $rank + 1;
        }
	echo '</table>';
}


?>
