<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pi Weather Station</title>

  <script src="index.js" defer></script>
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
  <main class="currentReadings">
    <div class="currentWeather">
      <h2>Weather from OpenWeather data:</h2>
      <h4 id=textfieldTemp></h4>
      <h4 id="pressureField"></h4>
      <h4 id="humidityField"></h4>
      <h3 id="time">Timestamp: </h3>

    </div>
    <div class="latestReading">
      <h2>Latest reading from Pi station:</h2>
      <h3 id=piTemp>Temp: 0.00000</h3>
      <h3 id="piPressure">Pressure: 0.00000</h3>
      <h3 id="piHumidity">Humidity: 0.00000</h3>
      <h3 id="timestamp">Timestamp: </h3>
    </div>
  </main>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>