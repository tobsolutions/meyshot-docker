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

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <span class='nav-item'>aktuelle Aufsicht: 
      <?php
        include('../dbconnect.php');
        $sql = 'SELECT aufsichten_name FROM aufsichten_log, aufsichten WHERE aufsichten_log.aufsichten_id=aufsichten.aufsichten_id ORDER BY `aufsichten_log_login` ASC LIMIT 1';
        $result = mysqli_query($link_meyshot, $sql);
        
        while ($row = mysqli_fetch_array($result)) {
            echo $row[0];
        }

        mysqli_free_result($result);
      ?>
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

  <?php
    include('../dbconnect.php');
    if($link_ssmdb2)
    {
            mysqli_select_db($link_ssmdb2, "Scheiben");
            $res = mysqli_query($link_ssmdb2, "SELECT StarterlistenID FROM Scheiben ORDER BY StarterlistenID ASC");           
            $num = mysqli_num_rows($res);                   
            if($num > 0) 
            {                       
                    while ($dsatz = mysqli_fetch_assoc($res))
                    {
                            $stlistid = $dsatz["StarterlistenID"];
                    }
            }       
            mysqli_close($link_ssmdb2);
    }else {
            $stlistid = -1;         
    }               
  ?>

  <!-- Page Content -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="row standanzeige">
          <?php
          include('../dbconnect.php');
          $StandNrStart=1;
          $StandNrEnde=12;
          $StandNrAnzahl=$StandNrEnde-$StandNrStart+1;
          for($i=$StandNrStart; $i <= $StandNrEnde; $i++) {
            if($StandNrAnzahl<=4)
            {
              ?><div class="col-sm-6 stand"><?php
            }
            else if($StandNrAnzahl<=6)
            {
              ?><div class="col-sm-4 stand"><?php
            }
            else if($StandNrAnzahl<=8)
            {
              ?><div class="col-sm-3 stand"><?php
            }
            else if($StandNrAnzahl<=12)
            {
              ?><div class="col-sm-2 stand"><?php
            }
            $sql = "SELECT ScheibenID, Nachname, Vorname, Zeitstempel, Starterliste, Disziplin, Trefferzahl, TotalRing, TotalRing01, BesterTeiler01 FROM Scheiben WHERE Zeitstempel IN (SELECT Max(Zeitstempel) FROM `Scheiben` GROUP By StandNr) AND StandNr=" . $i . " ORDER BY StandNr";
            $result = mysqli_query($link_ssmdb2, $sql);
            $scheibenID=0;
            while ($row = mysqli_fetch_array($result)) {
                echo "<div class='row'><div class='col-sm-1 stand-nr'>" . $i . "</div><div class='col-sm-10' id='stand" . $i . "'>&nbsp;" . $row[1] . ", " . $row[2] . "</div></div>";
                echo "<div class='stand" . $i . "'>" . $row[6] . ": <b>" . $row[7]/10 . "</b> (" . $row[8]/10 . ")</div>";
                $scheibenID = $row[0];
            }
            /*Anfang Bild*/
            $sql="SELECT x, y, Stellung, Treffer, Ring01 FROM Treffer WHERE ScheibenID='" . $scheibenID . "'";
            $result = mysqli_query($link_ssmdb2, $sql);
            $image_breite = 500;
            $image_hoehe = 500;
            $image_strich = 5;
            $font = 'fonts/arial.ttf';
            $image = imagecreatetruecolor ($image_breite, $image_hoehe); 
            $image_weiss = imageColorAllocate($image, 255, 255, 255);
            $image_schwarz = imageColorAllocate($image, 0, 0, 0);
            $image_grau = imageColorAllocate($image, 230, 230, 230);
            $image_ring1 = 455;
            $image_ring2 = 405;
            $image_ring3 = 355;
            $image_ring4 = 305;
            $image_ring5 = 255;
            $image_ring6 = 205;
            $image_ring7 = 155;
            $image_ring8 = 105;
            $image_ring9 = 55;
            $image_ring10 = 5;
            $image_ringiz = 1;
            $image_fonthoehe_schuss= 16;
            $image_fonthoehe_ringe= 12;
            $image = imagecreatefrompng("img/lg.png");
            /*imageFill($image, 0, 0, $image_weiss);
            imagerectangle ($image, 0, 0, $image_breite-1, $image_hoehe-1, $image_schwarz);
            imageFilledEllipse ($image, ($image_breite/2), ($image_hoehe/2), $image_ring1, $image_ring1, $image_schwarz);
            imageFilledEllipse ($image, ($image_breite/2), ($image_hoehe/2), $image_ring1-$image_strich, $image_ring1-$image_strich, $image_weiss);
            imageFilledEllipse ($image, ($image_breite/2), ($image_hoehe/2), $image_ring2, $image_ring2, $image_schwarz);
            imageFilledEllipse ($image, ($image_breite/2), ($image_hoehe/2), $image_ring2-$image_strich, $image_ring2-$image_strich, $image_weiss);
            imageFilledEllipse ($image, ($image_breite/2), ($image_hoehe/2), $image_ring3, $image_ring3, $image_schwarz);
            imageFilledEllipse ($image, ($image_breite/2), ($image_hoehe/2), $image_ring3-$image_strich, $image_ring3-$image_strich, $image_weiss);
            imageFilledEllipse ($image, ($image_breite/2), ($image_hoehe/2), $image_ring4, $image_ring4, $image_schwarz);
            imageFilledEllipse ($image, ($image_breite/2), ($image_hoehe/2), $image_ring5, $image_ring5, $image_weiss);
            imageFilledEllipse ($image, ($image_breite/2), ($image_hoehe/2), $image_ring5-$image_strich, $image_ring5-$image_strich, $image_schwarz);
            imageFilledEllipse ($image, ($image_breite/2), ($image_hoehe/2), $image_ring6, $image_ring6, $image_weiss);
            imageFilledEllipse ($image, ($image_breite/2), ($image_hoehe/2), $image_ring6-$image_strich, $image_ring6-$image_strich, $image_schwarz);
            imageFilledEllipse ($image, ($image_breite/2), ($image_hoehe/2), $image_ring7, $image_ring7, $image_weiss);
            imageFilledEllipse ($image, ($image_breite/2), ($image_hoehe/2), $image_ring7-$image_strich, $image_ring7-$image_strich, $image_schwarz);
            imageFilledEllipse ($image, ($image_breite/2), ($image_hoehe/2), $image_ring8, $image_ring8, $image_weiss);
            imageFilledEllipse ($image, ($image_breite/2), ($image_hoehe/2), $image_ring8-$image_strich, $image_ring8-$image_strich, $image_schwarz);
            imageFilledEllipse ($image, ($image_breite/2), ($image_hoehe/2), $image_ring9, $image_ring9, $image_weiss);
            imageFilledEllipse ($image, ($image_breite/2), ($image_hoehe/2), $image_ring9-$image_strich, $image_ring9-$image_strich, $image_schwarz);
            imageFilledEllipse ($image, ($image_breite/2), ($image_hoehe/2), $image_ring10, $image_ring10, $image_weiss);
            imageFilledEllipse ($image, ($image_breite/2), ($image_hoehe/2), $image_ring10-$image_strich, $image_ring10-$image_strich, $image_schwarz);
            imageFilledEllipse ($image, ($image_breite/2), ($image_hoehe/2), $image_ringiz, $image_ringiz, $image_weiss);
            imageFilledEllipse ($image, ($image_breite/2), ($image_hoehe/2), $image_ringiz-$image_strich, $image_ringiz-$image_strich, $image_schwarz);*/
            /*imagettftext($image, $image_fonthoehe_ringe, 0, (($image_breite-$image_ring1)/2)+9, ($image_hoehe/2)+($image_fonthoehe_ringe/2), $image_schwarz, $font, "1");
            imagettftext($image, $image_fonthoehe_ringe, 0, (($image_breite-$image_ring2)/2)+9, ($image_hoehe/2)+($image_fonthoehe_ringe/2), $image_schwarz, $font, "2");
            imagettftext($image, $image_fonthoehe_ringe, 0, (($image_breite-$image_ring3)/2)+9, ($image_hoehe/2)+($image_fonthoehe_ringe/2), $image_schwarz, $font, "3");
            imagettftext($image, $image_fonthoehe_ringe, 0, (($image_breite-$image_ring4)/2)+9, ($image_hoehe/2)+($image_fonthoehe_ringe/2), $image_weiss, $font, "4");
            imagettftext($image, $image_fonthoehe_ringe, 0, (($image_breite-$image_ring5)/2)+9, ($image_hoehe/2)+($image_fonthoehe_ringe/2), $image_weiss, $font, "5");
            imagettftext($image, $image_fonthoehe_ringe, 0, (($image_breite-$image_ring6)/2)+9, ($image_hoehe/2)+($image_fonthoehe_ringe/2), $image_weiss, $font, "6");
            imagettftext($image, $image_fonthoehe_ringe, 0, (($image_breite-$image_ring7)/2)+9, ($image_hoehe/2)+($image_fonthoehe_ringe/2), $image_weiss, $font, "7");
            imagettftext($image, $image_fonthoehe_ringe, 0, (($image_breite-$image_ring8)/2)+9, ($image_hoehe/2)+($image_fonthoehe_ringe/2), $image_weiss, $font, "8");
            imagettftext($image, $image_fonthoehe_ringe, 0, (($image_breite+$image_ring1)/2)-18, ($image_hoehe/2)+($image_fonthoehe_ringe/2), $image_schwarz, $font, "1");
            imagettftext($image, $image_fonthoehe_ringe, 0, (($image_breite+$image_ring2)/2)-18, ($image_hoehe/2)+($image_fonthoehe_ringe/2), $image_schwarz, $font, "2");
            imagettftext($image, $image_fonthoehe_ringe, 0, (($image_breite+$image_ring3)/2)-18, ($image_hoehe/2)+($image_fonthoehe_ringe/2), $image_schwarz, $font, "3");
            imagettftext($image, $image_fonthoehe_ringe, 0, (($image_breite+$image_ring4)/2)-18, ($image_hoehe/2)+($image_fonthoehe_ringe/2), $image_weiss, $font, "4");
            imagettftext($image, $image_fonthoehe_ringe, 0, (($image_breite+$image_ring5)/2)-18, ($image_hoehe/2)+($image_fonthoehe_ringe/2), $image_weiss, $font, "5");
            imagettftext($image, $image_fonthoehe_ringe, 0, (($image_breite+$image_ring6)/2)-18, ($image_hoehe/2)+($image_fonthoehe_ringe/2), $image_weiss, $font, "6");
            imagettftext($image, $image_fonthoehe_ringe, 0, (($image_breite+$image_ring7)/2)-18, ($image_hoehe/2)+($image_fonthoehe_ringe/2), $image_weiss, $font, "7");
            imagettftext($image, $image_fonthoehe_ringe, 0, (($image_breite+$image_ring8)/2)-18, ($image_hoehe/2)+($image_fonthoehe_ringe/2), $image_weiss, $font, "8");
            imagettftext($image, $image_fonthoehe_ringe, 0, ($image_breite/2)-4, (($image_breite+$image_ring1)/2)-($image_fonthoehe_ringe/2), $image_schwarz, $font, "1");
            imagettftext($image, $image_fonthoehe_ringe, 0, ($image_breite/2)-4, (($image_breite+$image_ring2)/2)-($image_fonthoehe_ringe/2), $image_schwarz, $font, "2");
            imagettftext($image, $image_fonthoehe_ringe, 0, ($image_breite/2)-4, (($image_breite+$image_ring3)/2)-($image_fonthoehe_ringe/2), $image_schwarz, $font, "3");
            imagettftext($image, $image_fonthoehe_ringe, 0, ($image_breite/2)-4, (($image_breite+$image_ring4)/2)-($image_fonthoehe_ringe/2), $image_weiss, $font, "4");
            imagettftext($image, $image_fonthoehe_ringe, 0, ($image_breite/2)-4, (($image_breite+$image_ring5)/2)-($image_fonthoehe_ringe/2), $image_weiss, $font, "5");
            imagettftext($image, $image_fonthoehe_ringe, 0, ($image_breite/2)-4, (($image_breite+$image_ring6)/2)-($image_fonthoehe_ringe/2), $image_weiss, $font, "6");
            imagettftext($image, $image_fonthoehe_ringe, 0, ($image_breite/2)-4, (($image_breite+$image_ring7)/2)-($image_fonthoehe_ringe/2), $image_weiss, $font, "7");
            imagettftext($image, $image_fonthoehe_ringe, 0, ($image_breite/2)-4, (($image_breite+$image_ring8)/2)-($image_fonthoehe_ringe/2), $image_weiss, $font, "8");
            imagettftext($image, $image_fonthoehe_ringe, 0, ($image_breite/2)-4, (($image_breite-$image_ring1)/2)+($image_fonthoehe_ringe/2)+15, $image_schwarz, $font, "1");
            imagettftext($image, $image_fonthoehe_ringe, 0, ($image_breite/2)-4, (($image_breite-$image_ring2)/2)+($image_fonthoehe_ringe/2)+15, $image_schwarz, $font, "2");
            imagettftext($image, $image_fonthoehe_ringe, 0, ($image_breite/2)-4, (($image_breite-$image_ring3)/2)+($image_fonthoehe_ringe/2)+15, $image_schwarz, $font, "3");
            imagettftext($image, $image_fonthoehe_ringe, 0, ($image_breite/2)-4, (($image_breite-$image_ring4)/2)+($image_fonthoehe_ringe/2)+15, $image_weiss, $font, "4");
            imagettftext($image, $image_fonthoehe_ringe, 0, ($image_breite/2)-4, (($image_breite-$image_ring5)/2)+($image_fonthoehe_ringe/2)+15, $image_weiss, $font, "5");
            imagettftext($image, $image_fonthoehe_ringe, 0, ($image_breite/2)-4, (($image_breite-$image_ring6)/2)+($image_fonthoehe_ringe/2)+15, $image_weiss, $font, "6");
            imagettftext($image, $image_fonthoehe_ringe, 0, ($image_breite/2)-4, (($image_breite-$image_ring7)/2)+($image_fonthoehe_ringe/2)+15, $image_weiss, $font, "7");
            imagettftext($image, $image_fonthoehe_ringe, 0, ($image_breite/2)-4, (($image_breite-$image_ring8)/2)+($image_fonthoehe_ringe/2)+15, $image_weiss, $font, "8");*/
            while($row_img = mysqli_fetch_object($result))
            {
              imageFilledEllipse ($image, ($image_breite/2)+($row_img->x/10) , ($image_hoehe/2)+($row_img->y/10) , 45, 45, $image_grau);
              imageEllipse ($image, ($image_breite/2)+($row_img->x/10) , ($image_hoehe/2)+($row_img->y/10) , 45, 45, $image_schwarz);
              /*if ($row_img->Treffer < 10){
                imagettftext($image, $image_fonthoehe_schuss, 0, ($image_breite/2)+($row_img->x/10)-7 , ($image_hoehe/2)+($row_img->y/10)+8, $image_schwarz, $font, $row_img->Treffer);
              } else {
                imagettftext($image, $image_fonthoehe_schuss, 0, ($image_breite/2)+($row_img->x/10)-12 , ($image_hoehe/2)+($row_img->y/10)+8, $image_schwarz, $font, $row_img->Treffer);
              }*/

            }
            ob_start();
            imagepng($image, NULL, 5);
            $imagedata = ob_get_contents();
            ob_end_clean();
            echo '<img class="standscheibe stand' . $i . '" src="data:image/png;base64,'.base64_encode($imagedata).'" width="100"/>';
            imagedestroy($image);
            /*Ende Bild*/
            $sql="SELECT Treffer, Ring FROM Treffer WHERE ScheibenID='" . $scheibenID . "'";
            $result = mysqli_query($link_ssmdb2, $sql);
            $serie1=0;
            $serie2=0;
            $serie3=0;
            $serie4=0;
            $serie5=0;
            $serie6=0;
            while($row_serie = mysqli_fetch_object($result))
            {
              if($row_serie->Treffer < 11)
              {
                $serie1 = $serie1 + ($row_serie->Ring);
              }
              else if($row_serie->Treffer < 21)
              {
                $serie2 = $serie2 + ($row_serie->Ring);
              }
              else if($row_serie->Treffer < 31)
              {
                $serie3 = $serie3 + ($row_serie->Ring);
              }
              else if($row_serie->Treffer < 41)
              {
                $serie4 = $serie4 + ($row_serie->Ring);
              }
              else if($row_serie->Treffer < 51)
              {
                $serie5 = $serie5 + ($row_serie->Ring);
              }
              else if($row_serie->Treffer < 61)
              {
                $serie6 = $serie6 + ($row_serie->Ring);
              }
            }
            echo "<div class='text-center stand" . $i . "'>";
            if($serie1>0) echo $serie1 . " ";
            if($serie2>0) echo $serie2 . " ";
            if($serie3>0) echo $serie3 . " ";
            if($serie4>0) echo $serie4 . " ";
            if($serie5>0) echo $serie5 . " ";
            if($serie6>0) echo $serie6;
            ?></div></div>
            <?php
          }
          mysqli_free_result($result);
          ?>
        </div>
      </div>
      <!--<div class="col-sm-2">
        <div>rechte Spalte</div>
      </div>-->
    </div>
    <div>untere Spalte</div>
    <div id="untereSpalte"></div>
  </div>

  <script src="../js/jquery-1.10.2.min.js"></script>
  <script src="../js/LANA.min.js"></script>
  <script>
    var wsServerURL="ws://192.168.10.200:49472";
    var freieStaende;
    var connection = new WebSocket(wsServerURL);
    connection.addEventListener("open",function(){
      console.log('Server: Websocket gestartet');
      connection.send('{"Prot": "MEWS","VerP": "00000100","SubProt": "LA","VerSP": "00000100","SeqNo": 1,"Cmd": "GetFreeLanes","Data": {"StartlistID": <?php echo $stlistid; ?>}}')
      console.log('{"Prot": "MEWS","VerP": "00000100","SubProt": "LA","VerSP": "00000100","SeqNo": 1,"Cmd": "GetFreeLanes","Data": {"StartlistID": <?php echo $stlistid; ?>}}')

    },false)
    connection.addEventListener("message",function(e){
      console.log('Server "message": ' + e.data);
      var json = JSON.parse(e.data);
      $("#untereSpalte").html('Freie Stände: ' + json.Data);
      console.log('Freie Stände: ' + json.Data);
      for (var i = <?php echo $StandNrStart; ?>; i <= <?php echo $StandNrEnde; ?>; i++) {
        console.log("Stand " + i + " : " + json.Data.some(stand => stand === i));
        if((json.Data.some(stand => stand === i) == true)){
          $('.stand' + i).css("display", "none");
          $('#stand' + i).html("&nbsp;&nbsp;frei");
        }
      }
    },false)

  </script>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
