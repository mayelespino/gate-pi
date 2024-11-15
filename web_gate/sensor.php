<html>
<head>
</head>
<body bgcolor = "#336699">

<h1>Sensor</h1>

<a href="index.php">[HOME]</a>
<?php
date_default_timezone_set('America/Los_Angeles');
$date   = new DateTime(); //this returns the current date time
echo date_format($date,"Y/m/d H:i:s");
echo $result;
?>
<br/>
<br/>



<table border=1>
<tr>
<td>
<h3>Last check</h3>
<b>
<?php
$homepage = file_get_contents('http://sensor.local:5000/time-stamp/');
echo $homepage;
?>

</td>
<td>

<h3>Brightness</h3>
<?php
$homepage = file_get_contents('http://sensor.local:5000/brightness/');
echo $homepage;
?>

</td>
<td>

<h3>Humidity</h3>
<?php
$homepage = file_get_contents('http://sensor.local:5000/humidity/');
echo $homepage;
?>

</td>
<td>

<h3>Onboard Temp</h3>
<?php
$homepage = file_get_contents('http://sensor.local:5000/onboard-temp/');
echo $homepage;
?>

</td>
</tr>
<tr>
<td>

<h3>Temperature</h3>
<?php
$homepage = file_get_contents('http://sensor.local:5000/temperature/');
echo $homepage;
?>

</td>
<td>

<h3>Barometer</h3>
<?php
$homepage = file_get_contents('http://sensor.local:5000/barometer/');
echo $homepage;
?>

</td>
<td>

<h3>Motion</h3>
<?php
$homepage = file_get_contents('http://sensor.local:5000/human/');
echo $homepage;
?>

</td>
<td>
<h3>Bluetooth</h3>
<?php
$homepage = file_get_contents('http://sensor.local:5000/bt-stamp/');
echo $homepage;
?>
</td>
</tr>

</table>

<h2>History</h2>
<h3>Temperature</h3>
<?php
$homepage = file_get_contents('http://sensor.local:5000/temp-history/');
$arr = explode("\n", $homepage);
foreach($arr as $line) {
    echo $line;
    echo "</br>";
}

?>

</body>
</html>
