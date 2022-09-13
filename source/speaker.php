<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<body bgcolor="green">

<h1>3336 Fontana Pl</h1>
<a href="index.php">[HOME]</a>
<br/>
<?php
date_default_timezone_set('America/Los_Angeles');
$date   = new DateTime(); //this returns the current date time
echo date_format($date,"Y/m/d H:i:s");
echo $result;
?>
<br/>
<form action="speaker.php" method="post">
    <hr/>
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
    <br/>
    <hr/>
</form>


<!-- Dynamically created buttons -->
<H2>Stations</H2>

<form action="speaker.php" method="post">
<?php
        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "http://speaker.local:5000/list_stations/");

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);
        $stations = explode(',', $output );

        // close curl resource to free up system resources
        curl_close($ch);

        foreach ($stations as &$item) {
            echo "<input type='submit' name=$item value=$item />";
        }
?>
</form>

<!-- Read selection and send request -->

<hr/>
<H2>Result</H2>

<?php 


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    require_once('functions.php');

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
        echo "$name<br/>";
	echo play_it($value);
	break;
    }
}

?> 

</body>
</html>
