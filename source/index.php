<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<body style="background-color:black;color:white;">

<h1>3336 Fontana </h1>

<B>
<?php
date_default_timezone_set('America/Los_Angeles');
$date   = new DateTime(); //this returns the current date time
echo date_format($date,"Y/m/d H:i:s");
echo $result;
?>
<B/>
<br/>
<br/>

<table border=1>
<tr>
<td>

<a href="sensor.php">sensor PI</a>

</td><td>

<?php
require_once('functions.php');
$url = "http://sensor.local/";
$result = get_url($url);
if ($result == '' ) {
  echo "<b><font color=\"red\">OUT</font></b>";
} else {
  echo "<b><font color=\"green\">OK</font></b>";
}
?>
</td><td>

</td><td>

<a href="speaker.php">speaker PI</a>

</td><td>

<?php
require_once('functions.php');
$url = "http://speaker.local/";
$result = get_url($url);
if ($result == '' ) {
  echo "<b><font color=\"red\">OUT</font></b>";
} else {
  echo "<b><font color=\"green\">OK</font></b>";
}
?>

</td>
</td><td>

At home

</td><td>

<?php
require_once('functions.php');
$url = "http://sensor.local:5000/bt-status/";
$result = get_url($url);
if ($result != "IN" ) {
  echo "<b><font color=\"red\">OUT</font></b>";
} else {
  echo "<b><font color=\"green\">IN</font></b>";
}
?>

</td>
<tr/>
</table>



<h2>Weather</h2>
<iframe src="http://wttr.in/94509" height="130" width="240"></iframe>
<br/>
<a href="http://wttr.in/94509">Full weather report 94509</a>
<br/>




</body>
</html>
