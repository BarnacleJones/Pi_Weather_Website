<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pi Weather Station</title>
  <script src="index.js" type="module" defer></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>


<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img width="5%" src="./images/raspberry-pi-logo_imagelarge.png"> Ben's Weather Station</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" href="./index.php">Home</a>
          <a class="nav-link active" href="./about.html">About</a>
          <a class="nav-link" aria-current="page" href="#">All Readings</a>
        </div>
      </div>
    </div>
  </nav>
  <h1>All Readings</h1>

  <div class="container">
    <?php include "connection.php" ?>
    <?php

    //Database connection
    $connection = new mysqli('localhost', $user, $pw, $db);

    //error if connection fails
    if ($connection->connect_errno) {
      printf("Connect failed: %s\n", $connection->connect_error);
      exit();
    }
    //variable that returns all records in database
    //creates a connection object
    $result = $connection->query('SELECT * FROM sense_data order by TIMESTAMP desc');

    //https://www.w3schools.com/Php/func_mysqli_fetch_row.asp

    while ($row = mysqli_fetch_row($result)) {
      echo ("<div class='card'>
         <div class='card-body'>
           <h2 class='card-title'>Timestamp: $row[5]</h2>
           <ul class='list-group list-group-flush'>
              <li class='list-group-item'>Temperature: $row[2]</li>
              <li class='list-group-item'>Pressure: $row[3]</li>
              <li class='list-group-item'>Humidity:$row[4]</li>
           </ul>
          </div>
        </div>"
      );
    }
    $connection->close();

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

    ?>


  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>