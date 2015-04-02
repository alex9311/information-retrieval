<!-- Style sheet for the table to control placement -->
<style type="text/css">
  table {
    float:left;
    background:#FAEBD7;
    margin-left:10px;
  }
</style>

<?php
	// Get data from ideas csv into array
	$readhandle = fopen('Ideas_for_Mobile_Apps_TestSet.csv', "r");
	if(!$readhandle===FALSE){
		$headers = fgetcsv($readhandle, 5000, ",");
		$textkey = array_search('text_description', $headers);
		$textarray = array();
		$count = 1;
		while (($data = fgetcsv($readhandle, 5000, ",")) !== FALSE) {
			$textarray[$count] = $data[$textkey];
			$count++;
		}
		fclose($readhandle);
	}else{
		die("FILE NOT FOUND!");
	}
	
	$rankings = array();
	for ($i = 1; $i <= count($textarray); $i++) {
		$row = array();
		$results = find_similar_ideas($i);
		//For each result
		for ($j = 0; $j < count($results); $j++) {
			$row[$results[$j]['id']] = $results[$j]['score'];
		}
		arsort($row);
		$rankings[$i] = $row;
	}
	
$map = 0; // Mean Average Precision
// Print top 10 of each ranking in a html table
for ($i = 1; $i <= count($textarray); $i++) {
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
$map = $map/count($textarray);
print "<table align=left border='1'>";
print '<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:30px;background-color:#9FF781"><th>Mean Average Precision: </th><td>'.round($map,4).'</td></tr>';
print "</table>";
?>
	
<?php
// Queries the Lucene database for ideas similar to the one connected to the given id
function find_similar_ideas($id){
	$url = "http://localhost:8983/solr/#/Test/";
	$query = "select?q=id:".$id."&mlt=true&mlt.count=10&mlt.fl=text_description&mlt.mintf=1&mlt.mindf=1&mlt.minwl=1&mlt.maxwl=15&mlt.maxqt=1000&mlt.maxntp=100000&wt=json&rows=100&fl=*,score";
	$ch = curl_init($url.$query);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
		if ($response === FALSE || $response == "") {
		die("Curl failed: " . curl_error($ch));
	}
	curl_close($ch);
	$data = json_decode($response,true);
	return $data['moreLikeThis'][$id]['docs'];
}
?>
