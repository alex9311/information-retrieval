<?php

include "../common/connect.php";

clear_lucene_db();

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
