<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<body style="background-color:powderblue;">

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
    <input type="submit" name="mute" value="mute"/>
    <input type="submit" name="100%" value="100%"/>
    <input type="submit" name="95%" value="95%"/>
    <input type="submit" name="85%" value="85%"/>
    <input type="submit" name="75%" value="75%"/>
    <input type="submit" name="50%" value="50%"/>
    <br/>
    <hr/>
    <h2>Information</h2>
    <input type="submit" name="cron" value="cron"/>
    <input type="submit" name="date_time" value="date_time"/>
    <br/>
    <hr/>

</form>

<hr/>

<h2>Internet radio stations</h2>
<form action="" method="post">
    <select name="stations">
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
            echo "<option value='$item'>$item</option>";
        }
        ?>
    </select>

    <input type="submit" name="submit" vlaue="Choose options">
</form>
<hr/>
<h2>Internet nature stations</h2>
<form action="" method="post">
    <select name="nature_stations">
        <?php

        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "http://speaker.local:5000/list_nature_stations/");

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);
        $stations = explode(',', $output );

        // close curl resource to free up system resources
        curl_close($ch);

        foreach ($stations as &$item) {
            echo "<option value='$item'>$item</option>";
        }
        ?>
    </select>

    <input type="submit" name="submit" vlaue="Choose options">
</form>
<hr/>
<h2>Internet chill stations</h2>
<form action="" method="post">
    <select name="chill_stations">
        <?php

        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "http://speaker.local:5000/list_chill_stations/");

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);
        $stations = explode(',', $output );

        // close curl resource to free up system resources
        curl_close($ch);

        foreach ($stations as &$item) {
            echo "<option value='$item'>$item</option>";
        }
        ?>
    </select>

    <input type="submit" name="submit" vlaue="Choose options">
</form>

<hr/>
<h2>Internet talk stations</h2>
<form action="" method="post">
    <select name="talk_stations">
        <?php

        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "http://speaker.local:5000/list_talk_stations/");

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);
        $stations = explode(',', $output );

        // close curl resource to free up system resources
        curl_close($ch);

        foreach ($stations as &$item) {
            echo "<option value='$item'>$item</option>";
        }
        ?>
    </select>

    <input type="submit" name="submit" vlaue="Choose options">
</form>
<hr/>
<h2>Internet upbeat stations</h2>
<form action="" method="post">
    <select name="upbeat_stations">
        <?php

        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "http://speaker.local:5000/list_upbeat_stations/");

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);
        $stations = explode(',', $output );

        // close curl resource to free up system resources
        curl_close($ch);

        foreach ($stations as &$item) {
            echo "<option value='$item'>$item</option>";
        }
        ?>
    </select>

    <input type="submit" name="submit" vlaue="Choose options">
</form>

<hr/>
<h2>Internet bible stations</h2>
<form action="" method="post">
    <select name="bible_stations">
        <?php

        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "http://speaker.local:5000/list_bible_stations/");

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);
        $stations = explode(',', $output );

        // close curl resource to free up system resources
        curl_close($ch);

        foreach ($stations as &$item) {
            echo "<option value='$item'>$item</option>";
        }
        ?>
    </select>

    <input type="submit" name="submit" vlaue="Choose options">
</form>

<h2>Output</h2>

<?php
    if(isset($_POST['submit'])){
    if(!empty($_POST['preset'])) {
       $selected = $_POST['preset'];
       post_it("mute");
       echo post_it($selected);
    } else {
        echo 'Please select the value.';
    }
    }
?>

<?php 

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['mute']))
{
  echo post_it("mute");
}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['100%']))
{
  echo post_it("100");
}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['95%']))
{
  echo post_it("95");
}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['85%']))
{
  echo post_it("85");
}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['75%']))
{
  echo post_it("75");
}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['50%']))
{
  echo post_it("50");
}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['cron']))
{
  echo post_it("cron");
}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['date_time']))
{
  echo post_it("date_time");
}


function post_it($path) {
	require_once('functions.php');
	$url = sprintf("http://speaker.local:5000/%s/", $path);
	$result = post_url($url); 
	return(str_replace("\n", "<br/>", $result)); 
}

?> 

</body>
</html>
