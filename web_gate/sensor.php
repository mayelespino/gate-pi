<html>
<head>
</head>
<body bgcolor = "#336699">

<h1>Sensor</h1>

<button onclick="history.back()">Go Back</button>
<hr/>
<br/>

<?php
date_default_timezone_set('America/Los_Angeles');
$date   = new DateTime(); //this returns the current date time
echo date_format($date,"Y/m/d H:i:s");
echo $result;
?>
<br/>
<br/>



<table border=0>
    <tr>
        <td>
            <b>Last check</b>
        </td>
        <td>
            <?php
            $homepage = file_get_contents('http://sensor.local:5000/time-stamp/');
            echo "hi";
            ?>

        </td>
    </tr>
        <td>
            <b>Brightness</b>
        </td>
        <td>
            <?php
            $homepage = file_get_contents('http://sensor.local:5000/brightness/');
            echo $homepage;
            ?>
        </td>
    <tr>
        <td>
            <b>Humidity</b>
        </td>
        <td>
            <?php
            $homepage = file_get_contents('http://sensor.local:5000/humidity/');
            echo $homepage;
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>Onboard Temp</b>
        </td>
        <td>
            <?php
            $homepage = file_get_contents('http://sensor.local:5000/onboard-temp/');
            echo $homepage;
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>Temperature</b>
        </td>
        <td>
            <?php
            $homepage = file_get_contents('http://sensor.local:5000/temperature/');
            echo $homepage;
            ?>
        </td>
    </tr>
        <td>
            <b>Barometer</b>
        </td>
        <td>
            <?php
            $homepage = file_get_contents('http://sensor.local:5000/barometer/');
            echo $homepage;
            ?>
        </td>
    </tr>
        <td>
            <b>Motion</b>
        </td>
        <td>
            <?php
            $homepage = file_get_contents('http://sensor.local:5000/human/');
            echo $homepage;
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>SpeedTest</b>
        </td>
        <td>
            <?php
            $homepage = file_get_contents('http://sensor.local:5000/speedtest/');
            echo $homepage;
            ?>
        </td>
    </tr>
</table>

</body>
</html>
