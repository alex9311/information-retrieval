<?php
include "database_fields.php";
$app_dir_name = "project";
$app_pos = strpos(__FILE__, $app_dir_name);
$path_to_dir= substr(__FILE__,0,$app_pos);
include $path_to_dir."../db_creds.php";


print("Are you sure you want to reset the database? Type yes if you do\n");
$answer = fgets(STDIN);
if(strcmp(trim($answer),"yes")!=0){
	exit();
}

// Create connection
$conn = new mysqli($sparked_servername, $sparked_username, $sparked_password, $sparked_dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


///Dropping and creating all tables
drop_table("Screening_results",$conn,false); 
drop_table("Seen",$conn,false); 
drop_table("Submitted",$conn,false); 
drop_table("Idea",$conn,false); 
drop_table("User",$conn,false); 
create_table("User",$user_fields,$conn,false);
create_table("Idea",$idea_fields,$conn,false);
create_table("Seen",$seen_fields,$conn,false);
create_table("Submitted",$submitted_fields,$conn,false);
create_table("Screening_results",$screening_results_fields,$conn,false);



function create_table($table_name,$fields,$conn,$verbal){
	$fields_string = implode($fields,",");
	$sql = "CREATE TABLE ".$table_name." ( ".$fields_string." ) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
	if ($conn->query($sql) === TRUE) {
    		if($verbal){echo $table_name." table created successfully\n";}
	} else {
    		echo "Error, could not create ".$table_name." table: " . $sql . "\n" . $conn->error."\n";
	}
}

function drop_table($table_name,$conn,$verbal){
	$sql = "DROP TABLE ".$table_name;
	if ($conn->query($sql) === TRUE) {
    		if($verbal){echo $table_name." table dropped successfully\n";}
	} else {
    		echo "Error, could not drop ".$table_name." table: " . $sql . "\n" . $conn->error."\n";
	}
}

$conn->close();

?>
