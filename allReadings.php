<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pi Weather Station</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script src="/Pi_Weather_Website/index.js" defer></script>
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
          <a class="nav-link" href="./index.html">Home</a>
          <a class="nav-link active" aria-current="page" href="#">About</a>
          <a class="nav-link" href="./allReadings.html">All Readings</a>
        </div>
      </div>
    </div>
  </nav>
  <h1>All Readings</h1>

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
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>