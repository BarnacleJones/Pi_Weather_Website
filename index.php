<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pi Weather Station</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
          <a class="nav-link" href="./about.html">About</a>
          <a class="nav-link" href="./allReadings.php">All Readings</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="welcomeArea">
    <h1>Welcome to Ben's Weather Station</h1>
    <br>
    <h2>Current Weather in location of Pi (<span id=city></span>)</h2>
  </div>
  <div class="container">

    <?php include "connection.php" ?>
    <?php

    //error handling - this is GOLDEN - remember this!
    //error handler function
    function customError($errno, $errstr)
    {
      echo "<b>Error:</b> [$errno] $errstr";
    }
    //set error handler
    set_error_handler("customError");


    //Database connection
    $connection = new mysqli('localhost', $user, $pw, $db);

    //error if connection fails
    if ($connection->connect_errno) {
      printf("Connect failed: %s\n", $connection->connect_error);
      exit();
    }
    // //variable that returns all records in database
    // //creates a connection object
    $result = $connection->query('SELECT * FROM sense_data ORDER BY TIMESTAMP desc LIMIT 1');

    $timestamp = "timestamp";
    $temp = "temp_reading";
    $pres = "press_reading";
    $humid = "humid_reading";

    if (mysqli_num_rows($result) > 0) {
      while ($data = mysqli_fetch_assoc($result)) {
        echo ("<div class='card'>
                  <div class='card-body'>
                    <h2 class='card-title'>Latest reading from Pi: </h2>
                    <ul class='list-group list-group-flush'>
                        <li class='list-group-item'>Temperature: $data[$temp]</li>
                        <li class='list-group-item'>Pressure: $data[$pres]</li>
                        <li class='list-group-item'>Humidity: $data[$humid]</li>
                        <li class='list-group-item'>Timestamp: $data[$timestamp]</li>
                    </ul>
                  </div>
                </div>");
      }
    } else {
      echo "No Records Found!";
    }

    $connection->close();

    ?>
    <div class="card">
      <div class="card-body">
        <h2 class="card-title">Weather from OpenWeather data:</h2>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><span id=textfieldTemp></span></li>
          <li class="list-group-item"><span id="pressureField"></span></li>
          <li class="list-group-item"><span id="humidityField"></span></li>
          <li class="list-group-item">Timestamp:<span id="time"></span></li>
        </ul>
      </div>
    </div>

    <!-- footer -->
    <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="text-center mt-5 footer-copyright">
          <a href="https://github.com/BarnacleJones/Pi_Weather_Website">GitHub</a>
        </div>
      </footer>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="index.js" type="module"></script>
<script type="module">
  import date from './node_modules/date-and-time/esm/date-and-time.es.min.js';
  const now = new Date();
  document.getElementById("time").innerText = date.format(now, 'hh:mm:s:SS A [GMT]Z');
</script>

</html>