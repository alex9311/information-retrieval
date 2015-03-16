<?php
function get_idea($idea_id){
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "Sparked";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
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
