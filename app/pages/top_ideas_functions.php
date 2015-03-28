<?php
include "../common/connect.php";
include "../common/database_functions.php";



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


?>
