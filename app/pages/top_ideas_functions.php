<?php
include "../common/connect.php";
include "../common/database_functions.php";



function get_top_ideas($app_directory){
	$conn = connect_db();
	$sql = "Select id, title,text_description,image,upvotes from Idea ORDER BY upvotes DESC LIMIT 5";
        $result = execute_mysql($sql,$conn);
	echo '<table border="1" cellpadding="10"  id="top-5-table">';
        echo' <tr><td >Rank</td><td>Image</td><td>Title</td><td>Number of Upvotes</td></tr></thead>';
	$rank = 1;
        while($row = $result->fetch_assoc()) {
		$title = $row["title"];
		$id = $row["id"];
		$num_votes = $row['upvotes'];
		$image_href = '<a href="'.$app_directory.'/pages/idea.php/?id='.$id.'">';
                echo '<tr>';
		echo '<td style="vertical-align:middle;">'.$rank."</td>";
		echo '<td>'.$image_href.'<img class="top_image" src="'.substr($row['image'],13).'"></a>'.'</td>';
               	echo '<td  style="vertical-align:middle;">'.$image_href.$title."</a></td>";
               	echo '<td  style="vertical-align:middle;">'.$num_votes."</td>";
		echo '</tr>';
		$rank = $rank + 1;
        }
	echo '</table>';
}


?>
