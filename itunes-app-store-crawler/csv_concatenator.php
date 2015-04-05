<?php
file_put_contents("itunes_apps.csv", "");
$output_file = fopen("itunes_apps.csv","a");

foreach($argv as $csv_file){
	if(strcmp($csv_file,"csv_concatenator.php")!=0){
		$input_file = fopen($csv_file,"r");
		while(! feof($input_file)){
  			$csv_obj = fgetcsv($input_file);
			$this_app= $csv_obj[0].",".$csv_obj[2]."\n";
			fwrite($output_file, $this_app);
		}
		fclose($input_file);
	}
}
fclose($output_file);
?>
