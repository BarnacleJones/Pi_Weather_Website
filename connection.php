<?php

// Database credentials
$user = 'root';
$pw = 'Yraspberry pi yum yum';
$db = 'sense_data';

//Database connection
$connection = new mysqli('localhost', $user, $pw, $db);


//variable that returns all records in database
//creates a connection object
$result = $connection->query('SELECT * FROM data');


//BELOW CODE IS FOR CSV READING
//Open the file.
// $fileHandle = fopen("data.csv", "r");

// echo '<h1>Temp/Pressure/Humidity/Time</h1>';

// //Loop through the CSV rows.
// while (($row = fgetcsv($fileHandle, 0, ",")) !== FALSE) {

//   echo ('<div class="card">
//   <div class="card-body">
//     <h2 class="card-title">Timestamp: ' . $row[3] . '</h2>
//     <ul class="list-group list-group-flush">
//       <li class="list-group-item">Temperature: ' . $row[0] . '</li>
//       <li class="list-group-item">Pressure: ' . $row[1] . '</li>
//       <li class="list-group-item">Humidity: ' . $row[2] . '</li>

//     </ul>
//   </div>
// </div>');
// }
