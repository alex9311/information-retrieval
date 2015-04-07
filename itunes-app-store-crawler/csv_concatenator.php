<?php
file_put_contents("itunes_apps.csv", "");
$output_file = fopen("itunes_apps.csv","a");

foreach($argv as $csv_file){
	if(strcmp($csv_file,"csv_concatenator.php")!=0){
		$input_file = fopen($csv_file,"r");
		while(! feof($input_file)){
  			$csv_obj = fgetcsv($input_file);
			$clean_title = str_replace(',','',$csv_obj[0]);
			$clean_description = str_replace(',','',$csv_obj[2]);
			$this_app= $clean_title.",".$clean_description."\n";
			fwrite($output_file, $this_app);
		}
		fclose($input_file);
	}
}
fclose($output_file);
?>
