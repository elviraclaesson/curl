<?php


$fileName = "www.mariaberntsson.se";
$ch = curl_init( "http://mariaberntsson.se");
$fp = fopen($fileName, "w");
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
fclose($fp);




$words = [
    'jag' => 0,
    'webbutvecklare' => 0,
    'är' => 0,
];

$content = file_get_contents($fileName);
$content = strip_tags($content);
$content = explode(' ', $content);
foreach ($words as $word => $amount) {
    //echo $words . '<br>';
}
foreach ($words as $word => $amount) {
    foreach ($content as $item) {
        if (strpos($item, $word) !== false) {
            $words[$word] = $words[$word] +1;
        }
    }
}




/*
$data = "Two jag and one är.";

foreach (count_chars($data, 1) as $i => $subs) {
  echo "There were $subs instance(s) of \"" , chr($i) , "\" in the string.\n";
}
/*
foreach ($content as $word => $amount) {
         $words[$word] = substr_count($content, $word);
        }
*/ 
var_dump($words);