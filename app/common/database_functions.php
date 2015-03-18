<?php
function execute_mysql($sql,$conn){
        if ($result = $conn->query($sql)){
                if(!(mysqli_num_rows($result) > 0)){
                        echo "Sorry, your query returned no rows.";
                        $conn->close();
                        exit();
                }
        }else{
                echo "Sorry, your query has no results";
                $conn->close();
                exit();
        }
        return $result;
}


?>
