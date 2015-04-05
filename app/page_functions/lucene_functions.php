<?php

include "../common/connect.php";

//add_idea_lucene("3","fresh2","2test fresh");
//find_similar_ideas("3");

function get_similar_results_table($similar_results,$new_idea_id){
	$similar_docs = $similar_results["response"]["docs"];
       	$more_similar_docs = $similar_results["moreLikeThis"][$new_idea_id]["docs"];
	$table = "";
       	$table .= "<h3>Ideas Similar</h3>";
       	$table .= '<table  border="1" cellpadding="10"  id="top-5-table">';
       	foreach($similar_docs as $doc){
		$table .= "<tr>";
		$table .= "<td>".$doc["id"]."</td>";
		$table .= "<td>".$doc["title"]."</td>";
		$table .= "<td>".$doc["text_description"]."</td>";
		$table .= "</tr>";
	}
       	foreach($more_similar_docs as $doc){
		$table .= "<tr>";
		$table .= "<td>".$doc["id"]."</td>";
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
	$query = "select?q=id:".$id."&mlt=true&mlt.count=5&mlt.fl=text_description&mlt.mintf=1&mlt.mindf=1&mlt.minwl=1&mlt.maxwl=15&mlt.maxqt=1000&mlt.maxntp=100000&wt=json&rows=100&fl=*,score";
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

	echo $ch."\n";
        $response = curl_exec($ch);
	echo $response."\n";
        if ($response === FALSE || $response == "") {
                die("Curl failed: " . curl_error($ch));
        }
        curl_close($ch);	
}
?>
