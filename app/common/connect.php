<?php
$app_dir_name = "project";
$app_pos = strpos(__FILE__, $app_dir_name);
$path_to_dir= substr(__FILE__,0,$app_pos);
include $path_to_dir."../db_creds.php";


function connect_db(){
	global $sparked_servername, $sparked_dbname, $sparked_password, $sparked_username;     

        $sparked_servername = "localhost";
        $sparked_username = "root";
        $sparked_password = "root";
        $sparked_dbname = "Sparked";

        // Create connection
        $conn = new mysqli($sparked_servername, $sparked_username, $sparked_password, $sparked_dbname);
        // Check connection
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
}


?>
