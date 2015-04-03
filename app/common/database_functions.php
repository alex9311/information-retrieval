<?php
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
