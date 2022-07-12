<?php
//Open the file.
$fileHandle = fopen("/home/pi/Documents/pythonScripts/data.csv", "r");

echo '<h1>Temp/Pressure/Humidity/Time</h1>';

//Loop through the CSV rows.
while (($row = fgetcsv($fileHandle, 0, ",")) !== FALSE) {

    echo 'Temperature: ' . $row[0] . '<br>';
    echo 'Pressure: ' . $row[1] . '<br>';
    echo 'Humidity: ' . $row[2] . '<br>';
    echo 'Timestamp: ' . $row[3] . '<br>';
    echo '<br>';
}

?>
