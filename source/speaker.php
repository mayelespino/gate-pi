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
    <br/>
    <hr/>
    <h2>Information</h2>
    <input type="submit" name="cron" value="cron"/>
    <input type="submit" name="date_time" value="date_time"/>
    <input type="submit" name="log" value="log"/>
</form>


<br/>
<hr/>

<form action="speaker.php" method="post">
<h2>Stations</h2>
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

<h2>Hey Google</h2>

<form action="speaker.php" method="post">
    <input type='submit' name='time' value='time' />
    <input type='submit' name='weather' value='weather' />
    <input type='submit' name='nature_sounds' value='nature_sounds' />
    <input type='submit' name='news' value='news' />
    <input type='submit' name='stop' value='stop' />
</form>

<br/>
<hr/>

<h2>Output</h2>

</body>
</html>

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
    case "log":
        $output = file_get_contents('http://speaker.local:5000/log/');
        $output = preg_replace("/\r\n|\r|\n/", '<br/>', $output);
        echo $output;
        break;
   case "date_time":
        $output = file_get_contents('http://speaker.local:5000/date_time/');
        echo $output;
        break;
    case "cron":
        $output = file_get_contents('http://speaker.local:5000/cron/');
        $output = preg_replace("/\r\n|\r|\n/", '<br/>', $output);
        echo $output;
        break;
   case "time":
        echo post_it("heygoogle/time");
        break;
   case "weather":
        echo post_it("heygoogle/weather");
        break;
    case "nature_sounds":
        echo post_it("heygoogle/nature_sounds");
        break;
    case "news":
        echo post_it("heygoogle/news");
        break;
    case "stop":
        echo post_it("heygoogle/stop");
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

<!--
--------------------------------------------------------------------------------
--------------------------------------------------------------------------------
NOTES:
- it is important to install php-curl, it is not installed by default:

sudo apt-get install php-curl


--------------------------------------------------------------------------------
--------------------------------------------------------------------------------
-->
