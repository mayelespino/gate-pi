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
<hr/>

<H1>Fortune</H1>
<br/>
<?php
$output = file_get_contents('https://fortuneapi.herokuapp.com/');
echo str_replace(array("\\n","\\t", "\"","\\"),array("<BR>","","",""),$output);
?>
<br/>
<P> Curtesy of https://github.com/sarah256/fortune-api</P>
<br/>
<hr/>


<h1>Weather</h1>
<br/>
<?php
echo file_get_contents('http://wttr.in/94509');
?>
-->
</body>
</html>
<!--
--------------------------------------------------------------------------------
--------------------------------------------------------------------------------
https://www.jhanley.com/pyscript-loading-python-code-in-the-browser/
https://www.tutorialspoint.com/python/python_cgi_programming.htm
https://readthedocs.org/projects/pyodide/downloads/pdf/latest/
--------------------------------------------------------------------------------
--------------------------------------------------------------------------------
-->
