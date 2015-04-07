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
$angry_birds_description = "Use the unique powers of the Angry Birds to destroy the greedy pigs' defenses!   The survival of the Angry Birds is at stake. Dish out revenge on the greedy pigs who stole their eggs. Use the unique powers of each bird to destroy the pigs’ defenses. Angry Birds features challenging physics-based gameplay and hours of replay value. Each level requires logic skill and force to solve.  If you get stuck in the game you can purchase the Mighty Eagle! Mighty Eagle is a one-time in-app purchase in Angry Birds that gives unlimited use. This phenomenal creature will soar from the skies to wreak havoc and smash the pesky pigs into oblivion. There’s just one catch: you can only use the aid of Mighty Eagle to pass a level once per hour. Mighty Eagle also includes all new gameplay goals and achievements!   In addition to the Mighty Eagle Angry Birds now has power-ups! Boost your birds’ abilities and three-star levels to unlock secret content! Angry Birds now has the following amazing power-ups: Sling Scope for laser targeting King Sling for maximum flinging power Super Seeds to supersize your birds and Birdquake to shake pigs’ defenses to the ground!";
add_idea_lucene($id,$angry_birds_description,"Angry Birds");
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
