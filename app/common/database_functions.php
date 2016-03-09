<?php
include "../../database/db_creds.php";

function connect_db(){
	global $sparked_servername, $sparked_dbname, $sparked_password, $sparked_username;     


        // Create connection
        $conn = new mysqli($sparked_servername, $sparked_username, $sparked_password, $sparked_dbname);
        // Check connection
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
}

function execute_mysql($sql,$conn){
        if ($result = $conn->query($sql)){
        	return $result;
        }else{
                echo "Sorry, your query has no results";
                $conn->close();
                exit();
        }
}


?>
