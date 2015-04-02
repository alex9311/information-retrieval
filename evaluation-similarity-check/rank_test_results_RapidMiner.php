<!-- Style sheet for the table to control placement -->
<style type="text/css">
  table {
    float:left;
    background:#FAEBD7;
    margin-left:10px;
  }
</style>

<?php
$rankings = array();
for ($i = 1; $i <= 50; $i++) {
	$rankings[$i] = array();
}
// Read file into array
$readhandle = fopen('Results_RapidMiner.csv', "r");
if(!$readhandle===FALSE){
	$headers = fgetcsv($readhandle, 5000, ",");
	while (($data = fgetcsv($readhandle, 5000, ",")) !== FALSE) {
		$rankings[$data[0]][$data[1]] = $data[2];
	}
	fclose($readhandle);
}else{
	die("FILE NOT FOUND!");
}

$map = 0; // Mean Average Precision
// Print top 10 of each ranking in a html table
for ($i = 1; $i <= 50; $i++) {
	$avep = 0; // Average Precision
	$rel = 0; // Nr relevant
	$patk = 0; // Precision at k
	$relk = 0; // Relevant at k
	
	print "<table border='1'>";
	print '<tr style="background-color:LemonChiffon;"><th>Idea_id :'.$i.'</th></tr>';
	print '<tr><th>ID</th><th>Similarity</th></tr>';
	$rank = $rankings[$i];
	$count = 0;
	foreach ($rank as $key => $val) {
		$relk = 0;
		$backcolor = "snow";
		// If result is relevant then color the background blue
		if($key%10 == $i%10){
			$backcolor = "PaleTurquoise";
			$relk = 1;
			$rel++;
		}
		$patk = $rel/($count + 1);
		$avep = $avep + ($patk * $relk);
		print '<tr style="background-color:'.$backcolor.';"><td>'.$key.'</td><td>'.$val.'</td></tr>';
		$count++;
		if($count==10){
			break;
		}
	}
	$avep = $avep / 4; // 4 is the total number of relevant documents
	$map = $map + $avep;
	print '<tr style="background-color:#F5BCA9;"><td>AveP</td><td>'.round($avep,4).'</td></tr>';
	print "</table>";
}
$map = $map/50;
print "<table align=left border='1'>";
print '<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:30px;background-color:#9FF781"><th>Mean Average Precision: </th><td>'.round($map,4).'</td></tr>';
print "</table>";
?>