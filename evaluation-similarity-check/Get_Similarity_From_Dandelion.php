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
	
	// Check how many rows have already been written
	$readhandle = fopen('Results_Dandelion.csv', 'r');
	$startpoint = 0;
	if(!$readhandle===FALSE){
		while (($data = fgetcsv($readhandle, 5000, ",")) !== FALSE) {
			$startpoint++;
		}
		fclose($readhandle);
	}
	
	$writehandle = fopen('Results_Dandelion.csv', 'a');
	// Write headers if file was empty or newly made
	if($startpoint == 0){
		$headers = array();
		for($i = 0; $i < $count; $i++) {
			$headers[$i]= $i;
		}
		fputcsv($writehandle, $headers);
	}	
	// Add rows of similarity results to csv
	for ($i = $startpoint; $i < $count; $i++) {
		$row = array();
		$row[0] = $i;
		for ($j = 1; $j <= $i-1; $j++) {
			$simunit = checksimilarity($textarray[$i], $textarray[$j]);
			$row[$j] = $simunit['similarity'];
			// Stop when we run out of units on dandelion
			if($simunit['unitsleft'] < 5){
				$i = $count;
				die("OUT OF UNITS!");
			}
			sleep(3);
		}
		fputcsv($writehandle, $row);
	}
	fclose($writehandle);
?>

<?php
// Sends two pieces of text to dandelion. Receives a similarity score and the number of units left in the account (out of 1000/day);
function checksimilarity($text1, $text2){
	$APP_ID = "be74004e";
	$APP_KEY = "d66601de0bbab64465846a1a2b20b755";
	$url = "https://api.dandelion.eu/datatxt/sim/v1/";
	$ch = curl_init($url.'?text1='.urlencode($text1).'&text2='.urlencode($text2).'&lang=en&$app_id='.$APP_ID.'&$app_key='.$APP_KEY);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_HEADER, true);
	$response = curl_exec($ch);
	if ($response === FALSE || $response == "") {
		die("Curl failed: " . curl_error($ch));
	}
	$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
	curl_close($ch);
	$header = substr($response, 0, $header_size);
	$header = http_parse_headers ($header);
	$body = substr($response, $header_size);
	$unitsleft = $header['X-Dl-Units-Left'];
	$data = json_decode($body);
	$similarityscore = $data->{'similarity'};
	$array = array("similarity" => $similarityscore, "unitsleft" => $unitsleft);
	return $array;
}
?>

<?php
//Function taken from anonymous submission on the php site. Similar function exists in the PECL HTTP library
   function http_parse_headers($raw_headers) {
        $headers = array();
        $key = '';

        foreach(explode("\n", $raw_headers) as $i => $h) {
            $h = explode(':', $h, 2);

            if (isset($h[1])) {
                if (!isset($headers[$h[0]]))
                    $headers[$h[0]] = trim($h[1]);
                elseif (is_array($headers[$h[0]])) {
                    $headers[$h[0]] = array_merge($headers[$h[0]], array(trim($h[1])));
                }
                else {
                    $headers[$h[0]] = array_merge(array($headers[$h[0]]), array(trim($h[1])));
                }

                $key = $h[0];
            }
            else { 
                if (substr($h[0], 0, 1) == "\t")
                    $headers[$key] .= "\r\n\t".trim($h[0]);
                elseif (!$key) 
                    $headers[0] = trim($h[0]); 
            }
        }

        return $headers;
    }
?>