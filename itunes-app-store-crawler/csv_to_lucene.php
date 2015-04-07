<?php
clear_lucene_db();

$input_file = fopen($argv[1],"r");
$id = 1;
while(! feof($input_file)){
	$csv_obj = fgetcsv($input_file);
	$title = $csv_obj[0];
	$description = $csv_obj[1];
	add_idea_lucene($id,$description,$title);
	$id = $id+1;
}
fclose($input_file);

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

function clear_lucene_db(){
        $ch = curl_init("http://52.28.44.51:8983/solr/collection1/update?commit=true");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: text/xml'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, '<delete><query>*:*</query></delete>');

        echo $ch."\n";
        $response = curl_exec($ch);
        echo $response."\n";
        if ($response === FALSE || $response == "") {
                die("Curl failed: " . curl_error($ch));
        }
        curl_close($ch);
}

?>
