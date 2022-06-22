<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<body bgcolor = "#336699">

<h1>Speaker</h1>
<a href="index.php">[HOME]</a>
<?php
date_default_timezone_set('America/Los_Angeles');
$date   = new DateTime(); //this returns the current date time
echo date_format($date,"Y/m/d H:i:s");
echo $result;
?>


<br/>
<hr/>
<form action="speaker.php" method="post">
    <h2>Volume Control</h2>
    <input type="submit" name="mute" value="MUTE"/>
    <input type="submit" name="100" value="100%"/>
    <input type="submit" name="95" value="95%"/>
    <input type="submit" name="85" value="85%"/>
    <input type="submit" name="75" value="75%"/>
    <input type="submit" name="50" value="50%"/>
    <br/>
    <hr/>
    <h2>Information</h2>
    <input type="submit" name="cron" value="cron"/>
    <input type="submit" name="date_time" value="date_time"/>
</form>


<br/>
<hr/>

<form action="speaker.php" method="post">
<?php
    $output = file_get_contents('http://speaker.local:5000/list_stations/');
    $stations = explode(',', $output );
    foreach ($stations as &$item) {
      echo "<input type='submit' name=$item value=$item />";
 }
?>
</form>


<br/>
<hr/>

<?php


if($_SERVER['REQUEST_METHOD'] == "POST")
{

    foreach ($_POST as $name => $value) {
    }

    switch($name) {
    case "mute":
        echo post_it("mute");
    break;
    case "100":
        echo post_it("100");
    break;
    case "95":
        echo post_it("95");
    break;
    case "85":
        echo post_it("85");
    break;
    case "75":
        echo post_it("75");
    break;
    case "50":
        echo post_it("50");
    break;
    default:
        post_it("mute");
	echo "Now playing: $value <br/>";
        echo post_it("play_station/$value");
    break;
    }
}


function post_it($path) {
    $url = sprintf("http://speaker.local:5000/%s/", $path);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    $result = curl_exec($ch);
    return($result);
}


?>


</body>
</html>
<!--
--------------------------------------------------------------------------------
--------------------------------------------------------------------------------
NOTES:
- it is important to install php-curl, it is not installed by default:

sudo apt-get install php-curl


--------------------------------------------------------------------------------
--------------------------------------------------------------------------------
-->
