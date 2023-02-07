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
      <?php
        include('dbconnect.php');
        $sql = 'SELECT `User`.`Name` FROM `Aufsichten`,`User` WHERE `User`.ID=Aufsichten.User AND `Ende` IS NULL';
        $result = mysqli_query($link_meyshot, $sql);
        
        while ($row = mysqli_fetch_array($result)) {
            echo $row[0];
        }

        mysqli_free_result($result);
      ?>
      </span>
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
    <div class="row">
      <div class="col-sm-9">
        <div class="row">
          <img style="width: 100%; height: auto;" src="http://192.168.10.222:8090/?action=stream" />    
        </div>
      </div>      
      <div class="col-sm-3">
        <div class="row" id="infoticker">
          Suche Informationen ..
        </div>
      </div>   
  </div>

  <!-- JS -->
  <script src="js/jquery-3.4.1.js"></script>
  <script>
    $(document).ready(function() {
        $( "#infoticker" ).load("infoticker.php");
        setInterval(function() {
            $( "#infoticker" ).load("infoticker.php");
        }, 10000);
      });
  </script>

  <!-- Bootstrap core JavaScript -->
  <!--<script src="vendor/jquery/jquery.slim.min.js"></script>-->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
