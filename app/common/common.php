<?php
$app_directory = get_app_directory();
function get_app_directory(){
        $pos =  strpos(getcwd(),"app");
        $length = abs($pos+3-13);
        $app_directory =  substr(getcwd(),13,$length);
        return $app_directory;
}

?>
