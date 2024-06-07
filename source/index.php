<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<body bgcolor = "#336699">

<h1>3336 Fontana</h1>
<?php
date_default_timezone_set('America/Los_Angeles');
$date   = new DateTime(); //this returns the current date time
echo date_format($date,"Y/m/d H:i:s");
echo $result;
?>


<br/>
<hr/>
<a href="sensor.php">[sensor]</a>
<?php
$output = file_get_contents('http://speaker.local');
echo $output;
?>
<br/>
<a href="speaker.php">[speaker]</a>
<?php
$output = file_get_contents('http://sensor.local');
echo $output;
?>
<br/>
<a href="http://sensor.local:667" target="_blank">[darkstat]</a>
<br/>
<a href="http://sensor.local:3000" target="_blank">[ntopng]</a>
<br/>
<a href="bookmarks.php">[bookmarks]</a>
<hr/>


<h2>Weather</h2>
<br/>
<?php
echo file_get_contents('http://wttr.in/94509');
?>
<br/>
<hr/>


<h2>News</h2>
<br/>
<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://text.npr.org",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: newsdata2.p.rapidapi.com",
		"X-RapidAPI-Key: cb230719a4mshf62634bba5855e0p146542jsnb08b8b854b39"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$decoded_json = json_decode($response, true);
	$results = $decoded_json['results'];
	foreach($results as $article) {
    		$title = $article['title'];
		echo "<b>$title</b><br/>";
		$link = $article['link'];
		echo "<i>$link</i><br/><br/>";
		$description = $article['description'];
		echo "$description<br/><br/>";
		$content = $article['content'];
		echo "$content<br/>";
		echo "<br/><hr/>";
	}

}
?>

<H2>Links</H2>

<a href='https://www.sf72.org'>SF72 - San Francisco </a><br/>
<a href='https://text.npr.org'>NPR</a><br/>

</body>
</html>
<!--
	// echo var_dump($decoded_json);
--------------------------------------------------------------------------------
--------------------------------------------------------------------------------
https://www.jhanley.com/pyscript-loading-python-code-in-the-browser/
https://www.tutorialspoint.com/python/python_cgi_programming.htm
https://readthedocs.org/projects/pyodide/downloads/pdf/latest/
--------------------------------------------------------------------------------
--------------------------------------------------------------------------------
-->
