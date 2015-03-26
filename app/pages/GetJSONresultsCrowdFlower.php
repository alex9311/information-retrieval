<?php include "../common/connect.php";?>
<?php
	// Create connection 
	$conn = connect_db(); 
	// Convert JSON object to php associative array 
	$data = json_decode($_POST['payload'], true);
	
	if($_POST['signal'] == "unit_complete"){
		// Get the results 
		$id_idea = $data['data']['id']; 
		$acceptedstring = $data['results']['should_this_idea_be_rejected']['agg'];
		$reason = $data['results']['why_should_this_idea_be_rejected']['agg'];
		// Insert into the table 
			$sql = "";
			if($acceptedstring=="Yes"){
				$accepted = 0;
			}else if($acceptedstring=="No"){
				$accepted = 1;
			}else if($acceptedstring=="Not Sure"){
				$accepted = -1;
			}
			$sql =  'INSERT INTO Screening_results_crowdflower(id_idea, accepted, reason) VALUES("'.$id_idea.'", "'.$accepted.'", "'.$reason.'")';
			if($sql!==""){
				//and insert!
				if ($conn->query($sql) === TRUE) {
					echo "New record created successfully";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
		$conn->close();
	}
?>

