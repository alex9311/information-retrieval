<?php include "../common/connect.php";?>
<?php
	// Create connection 
	$conn = connect_db(); 
	// Convert JSON object to php associative array 
	$data = json_decode($_POST['payload'], true);
	// Check signal type and signature for security
	$api_key = "vREt_GNtauNnKc3y1JXX";
	if($_POST['signal'] == "unit_complete" && $_POST['signature']===sha1($_POST['payload'].$api_key)){
		// Get the results 
		$id_idea = $data['data']['id']; 
		$acceptedstring = $data['results']['should_this_idea_be_rejected']['agg'];
		$reason = $data['results']['why_should_this_idea_be_rejected']['agg'];
		$accepted = -1;
		if($acceptedstring=="Yes"){
			$accepted = 0;
		}else if($acceptedstring=="No"){
			$accepted = 1;
		}
		// Send results to database
		$sql =  'INSERT INTO Screening_results_crowdflower(id_idea, accepted, reason) VALUES("'.$id_idea.'", "'.$accepted.'", "'.$reason.'")';
		$conn->query($sql);
		$conn->close();
		// TODO: If $accepted is 0 send notification to the user. If $accepted is -1 send idea to admin for judgement.
		// TODO: Create error log to catch and document errors
	}
?>

