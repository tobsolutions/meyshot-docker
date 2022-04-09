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
          <?php
            $sql = 'SELECT * FROM Infoticker ORDER BY Startdatum ASC';
            $result = mysqli_query($link_meyshot, $sql);
            if ( ! $result )
            {
              die('Ungültige Abfrage: ' . mysqli_error());
            }
            
            while ($row = mysqli_fetch_array($result)) {
              echo '<div class="card" width="100%">';
              echo '<div class="card-header"><h4>';
              echo $row['Titel'];
              echo '</h4></div>';
              echo '<div class="card-body">';
              echo $row['Enddatum'] . ' ' . $row['Text'];
              echo '</div>';
              echo '</div>';
            }

            mysqli_free_result($result);
          ?>
        </div>
      </div>   
  </div>

  <script src="js/jquery-1.10.2.min.js"></script>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
