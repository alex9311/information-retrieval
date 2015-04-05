<?php

include "../common/connect.php";

//add_idea_lucene("3","fresh2","2test fresh");
//find_similar_ideas("3");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  	$conn =  connect_db();
        $sql = 'INSERT INTO Idea (title, text_description) VALUES ("", "")';
        $conn->query($sql);
	$idea_id = mysqli_insert_id($conn);

	$idea_title 	=  $_POST["title"];
	$idea_description =  $_POST["description"];


	add_idea_lucene($idea_id,$idea_description,$idea_title);
	$similar_results = find_similar_ideas($idea_id);
	$similar_table = get_similar_results_table($similar_results,$idea_id);
       	delete_idea_lucene($idea_id);
	

	$delete_placeholder = 'DELETE FROM Idea WHERE id = '.$idea_id;
        $conn->query($delete_placeholder);
	$conn->close();

	echo $similar_table;
}


function get_similar_results_table($similar_results,$new_idea_id){
	$similar_docs = $similar_results["response"]["docs"];
       	$more_similar_docs = $similar_results["moreLikeThis"][$new_idea_id]["docs"];
	if(empty($similar_docs)){
		return '<h4 align="center">Your idea is completely unique!<\h4>';
	}
	$table = "";
       	$table .= '<h4 align="center">Ideas Similar</h4>';
       	$table .= '<table  border="1" cellpadding="10"  id="top-5-table">';
       	foreach($similar_docs as $doc){
		$table .= "<tr>";
		$table .= "<td>".$doc["title"]."</td>";
		$table .= "<td>".$doc["text_description"]."</td>";
		$table .= "</tr>";
	}
       	foreach($more_similar_docs as $doc){
		$table .= "<tr>";
		$table .= "<td>".$doc["title"]."</td>";
		$table .= "<td>".$doc["text_description"]."</td>";
		$table .= "</tr>";
	}
       	$table .= "</table>";
	return $table;
}

function add_idea_lucene($id,$description,$title){
	$ch = curl_init("http://52.28.44.51:8983/solr/collection1/update?commit=true&wt=json");
	$idea_array = array(
    		"add" => array( 
        		"doc" => array(
                		"id" => $id,
                		"text_description" => $description,
                		"title" => $title
        		),
        		"commitWithin" => 1,
    		),
	);
        $idea_json = json_encode($idea_array);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $idea_json);

        $response = curl_exec($ch);
        if ($response === FALSE || $response == "") {
                die("Curl failed: " . curl_error($ch));
        }
	curl_close($ch);
}


function find_similar_ideas($id){
	$url = "http://52.28.44.51:8983/solr/collection1/";
	//$query = "select?q=id:".$id."&mlt=true&mlt.count=5&mlt.fl=text_description&mlt.mintf=1&mlt.mindf=1&mlt.minwl=1&mlt.maxwl=15&mlt.maxqt=1000&mlt.maxntp=100000&wt=json&rows=100&fl=*,score";
	$query = "select?q=id:".$id."&mlt=true&mlt.count=5&mlt.fl=text_description&mlt.mintf=1&mlt.mindf=1&mlt.minwl=1&mlt.maxwl=455&mlt.maxqt=1000&mlt.maxntp=100000&wt=json&rows=100&fl=*,score";
	$ch = curl_init($url.$query);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	if ($response === FALSE || $response == "") {
		die("Curl failed: " . curl_error($ch));
	}
	curl_close($ch);
	$data = json_decode($response,true);
	return $data;
}


function delete_idea_lucene($id){
        $ch = curl_init("http://52.28.44.51:8983/solr/collection1/update?commit=true");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: text/xml'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, '<delete><query>id:'.$id.'</query></delete>');

        $response = curl_exec($ch);
        if ($response === FALSE || $response == "") {
                die("Curl failed: " . curl_error($ch));
        }
        curl_close($ch);	
}
?>
