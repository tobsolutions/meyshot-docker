<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MeyShot VIS</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

</head>

<body>
  <?php require('dbconnect.php'); ?>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <span class='nav-item'>aktuelle Aufsicht: siehe Aufsichtenplan
      <?php /*
        include('dbconnect.php');
        $sql = 'SELECT aufsichten_name FROM aufsichten_log, aufsichten WHERE aufsichten_log.aufsichten_id=aufsichten.aufsichten_id ORDER BY `aufsichten_log_login` ASC LIMIT 1';
        $result = mysqli_query($link_meyshot, $sql);
        
        while ($row = mysqli_fetch_array($result)) {
            echo $row[0];
        }

        mysqli_free_result($result);
      */?>
      </span>
      <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>-->
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <span>MeyShot Vis</span>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container-fluid">
    <div class="alert alert-warning alert-dismissible" id="nosocket">
      Es kann keine Verbindung zum Websocket ws://192.168.10.200:49472/ hergestellt werden.
    </div>

    <div class="row">
      <div class="col-sm-9">
        <div class="row">
          <img style="width: 100%; height: auto;" src="http://192.168.10.222:8090/?action=stream" />    
        </div>
      </div>      
      <div class="col-sm-3">
        <div class="row">
          <div class="card">
            <div class="card-header">
              <h4>Gauschützenkönig 2022</h4> 
            </div>
            <div class="card-body">
            <p>pro Schütze 1 Schuss auf die Gaukönig-Scheibe</br>
              Klassen: Jugend, LG, LP, Auflagex</br>
              <b> ! verlängert bis 08.04.2022 !</b></p>
            </div>
          </div> 
          <div class="card">
            <div class="card-header">
              <h4>Ostereierschießen 2022</h4> 
            </div>
            <div class="card-body">
            <p><b>Termin: 10.04.2022 ab 13.30 Uhr</b></br>
              Es wird auf bunte Spaßscheiben geschossen und es warten viele bunte Ostereier!</p>
            </div>
          </div> 
          <div class="card">
            <div class="card-header">
              <h4>Ostereierschießen 2022</h4> 
            </div>
            <div class="card-body">
              <?php
                $sql = 'SELECT * FROM Infoticker';
                $result = mysqli_query($link_meyshot, $sql);
                if ( ! $result )
                {
                  die('Ungültige Abfrage: ' . mysqli_error());
                }
                
                while ($row = mysqli_fetch_array($result)) {
                    echo $row['Titel'];
                }

                mysqli_free_result($result);
              ?>
            </div>
          </div> 
        </div>
      </div>   
  </div>

  <script src="js/jquery-1.10.2.min.js"></script>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
