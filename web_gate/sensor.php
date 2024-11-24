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



<table border=1>
    <tr>
        <td>
            <b>Last check</b>
        </td>
        <td>
            <?php
            $response = file_get_contents('http://sensor.local:5000/time-stamp/');
            echo $response;
            ?>

        </td>
    </tr>
        <td>
            <b>Brightness</b>
        </td>
        <td>
            <?php
            $response = file_get_contents('http://sensor.local:5000/brightness/');
            echo $response;
            ?>
        </td>
    <tr>
        <td>
            <b>Humidity</b>
        </td>
        <td>
            <?php
            $response = file_get_contents('http://sensor.local:5000/humidity/');
            echo $response;
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>Onboard Temp</b>
        </td>
        <td>
            <?php
            $response = file_get_contents('http://sensor.local:5000/onboard-temp/');
            echo $response;
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>Temperature</b>
        </td>
        <td>
            <?php
            $response = file_get_contents('http://sensor.local:5000/temperature/');
            echo $response;
            ?>
        </td>
    </tr>
        <td>
            <b>Barometer</b>
        </td>
        <td>
            <?php
            $response = file_get_contents('http://sensor.local:5000/barometer/');
            echo $response;
            ?>
        </td>
    </tr>
        <td>
            <b>Motion</b>
        </td>
        <td>
            <?php
            $response = file_get_contents('http://sensor.local:5000/human/');
            echo $response;
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>SpeedTest</b>
        </td>
        <td>
            <?php
            $response = file_get_contents('http://sensor.local:5000/speedtest/');
            $response = str_replace(",",",<br/>", $response);
            echo $response;
            ?>
        </td>
    </tr>
</table>

</body>
</html>
