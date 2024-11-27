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
$output = file_get_contents('http://sensor.local');
echo $output;
?>

<?php
	$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	if ($url == "gate.local/") {
		echo "<a href=\"speaker.php\">[speaker]</a>";
	} else {
		echo "[speaker]";
	}
	$output = file_get_contents('http://speaker.local');
	echo $output;
?>


<?php
	$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	if ($url == "gate.local/") {
		echo "<a href=\"http://gate.local:3000\">[graphana]</a>";
	} else {
		echo "[graphana]";
	}
	$output = file_get_contents('http://speaker.local');
	echo $output;
?>


<a href="bookmarks.php">[bookmarks]</a>

<a href="http://sensor.local:667" target="_blank">[darkstat]</a>

<a href="http://sensor.local:3000" target="_blank">[ntopng]</a>

<hr/>

<br/>

<?php
	$output = shell_exec('ping -c1 sensor.local');
	echo "<h3>sensorpi</h3><pre>$output</pre><br/>";

	$output = shell_exec('ping -c1 speaker.local');
	echo "<h3>speaker</h3><pre>$output</pre><br/>";

	$output = shell_exec('ping -c1 supermicro');
	echo "<h3>supermicro</h3><pre>$output</pre><br/>";

	$output = shell_exec('ping -c1 super2');
	echo "<h3>super2</h3><pre>$output</pre><br/>";
?>
<?php
	$output = shell_exec('ping -c1 antsle.local');
	echo "<h3>antsle</h3><pre>$output</pre><br/>";

	$output = shell_exec('ping -c1 chaperon.local');
	echo "<h3>chaperon</h3><pre>$output</pre><br/>";

	$output = shell_exec('ping -c1 Mac-mini-2.lan');
	echo "<h3>Mac-mini</h3><pre>$output</pre><br/>";

?>

<br/>
<H2>Links</H2>

<a href='https://www.sf72.org'>SF72 - San Francisco </a><br/>
<a href='https://text.npr.org'>NPR</a><br/>

</body>
</html>
