<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MeyShot VIS</title>
    <link href="vendor/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/css/carousel.css" rel="stylesheet">

    <style>
      body {
        --bg-color-header: #e84a52;
        --color-header: #fff;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      #header-row {
        background-color: var(--bg-color-header);
        color: var(--color-header);
      }

      #content{
        padding-top:10px;
      }
      
      .card{
        margin-bottom: 5px;
      }

      .py-3{
        padding-bottom: 0px !important;
      }
    </style>
    <!-- Custom styles for this template -->
  </head>
  <body class="d-flex flex-column h-100">
    <!-- Begin page content -->
    <main class="flex-shrink-0">
      <div class="container-fluid">
        <div class="row" id="header-row">
          <div class="col-6 offset-2">
            <span>aktuelle Aufsicht: <span id="aufsicht"></span></span>
          </div>
          <div class="col-2">
            <span>MeyShot VIS</span>
          </div>
        </div>
        <div class="row" id="content">
          <div class="col-9">
            <img id="stream" style="width: 100%; height: auto;" src="http://192.168.10.222:8090/?action=stream" />
          </div>
          <div class="col-3" id="infoticker">
            <div class="card">
              <div class="card-body">
                <p class="card-text">Suche Informationen ..
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <footer class="footer mt-auto bg-light" style="padding-top: 10px;">
      <div class="container-fluid">
        <div class="row align-items-end">
          <div class="col-1">
            <img src="img/logo.png" style="width:100%;">
          </div>
          <!--<div class="col-1">
            <img src="img/schuetzafest.png" style="width:100%;">
          </div>
          <div class="col-3" style="padding-bottom: 10px;">
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators" style="display:none;">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="5" aria-label="Slide 6"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="6" aria-label="Slide 7"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="7" aria-label="Slide 8"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="8" aria-label="Slide 9"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="9" aria-label="Slide 10"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="10" aria-label="Slide 11"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="11" aria-label="Slide 12"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="12" aria-label="Slide 13"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="13" aria-label="Slide 14"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="14" aria-label="Slide 15"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="15" aria-label="Slide 16"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="16" aria-label="Slide 17"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="17" aria-label="Slide 18"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="18" aria-label="Slide 19"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="19" aria-label="Slide 20"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <span>Mit freundlicher Unterstützung</br> </span>
                  <strong>Gold Ochsen</strong>
                </div>
                <div class="carousel-item">
                  <span>Mit freundlicher Unterstützung</br> </span>
                  <strong>Frankonia</strong>
                </div>
                <div class="carousel-item">
                  <span>Mit freundlicher Unterstützung</br> </span>
                  <strong>Gamper Holzbau</strong>
                </div>
                <div class="carousel-item">
                  <span>Mit freundlicher Unterstützung</br> </span>
                  <strong>Dietenbronner</strong>
                </div>
                <div class="carousel-item">
                  <span>Mit freundlicher Unterstützung</br> </span>
                  <strong>Kopanos - Gössler</strong>
                </div>
                <div class="carousel-item">
                  <span>Mit freundlicher Unterstützung</br> </span>
                  <strong>Zum Griaswirt - Schützenheim Vöhringen</strong>
                </div>
                <div class="carousel-item">
                  <span>Mit freundlicher Unterstützung</br> </span>
                  <strong>Foddis Technische Kunststoffteile</strong>
                </div>
                <div class="carousel-item">
                  <span>Mit freundlicher Unterstützung</br> </span>
                  <strong>Getränke Maier</strong>
                </div>
                <div class="carousel-item">
                  <span>Mit freundlicher Unterstützung</br> </span>
                  <strong>MRX Performance</strong>
                </div>
                <div class="carousel-item">
                  <span>Mit freundlicher Unterstützung</br> </span>
                  <strong>Freizeitbad Nautilla</strong>
                </div>
                <div class="carousel-item">
                  <span>Mit freundlicher Unterstützung</br> </span>
                  <strong>Fahrrad Böttcher</strong>
                </div>
                <div class="carousel-item">
                  <span>Mit freundlicher Unterstützung</br> </span>
                  <strong>Handyman</strong>
                </div>
                <div class="carousel-item">
                  <span>Mit freundlicher Unterstützung</br> </span>
                  <strong>Ums Eck - Dana Neuhäusler </strong>
                </div>
                <div class="carousel-item">
                  <span>Mit freundlicher Unterstützung</br> </span>
                  <strong>Brunnen Apotheke Bellenberg</strong>
                </div>
                <div class="carousel-item">
                  <span>Mit freundlicher Unterstützung</br> </span>
                  <strong>beam GmbH</strong>
                </div>
                <div class="carousel-item">
                  <span>Mit freundlicher Unterstützung</br> </span>
                  <strong>Salmanbau</strong>
                </div>
                <div class="carousel-item">
                  <span>Mit freundlicher Unterstützung</br> </span>
                  <strong>Karger</strong>
                </div>
                <div class="carousel-item">
                  <span>Mit freundlicher Unterstützung</br> </span>
                  <strong>Metzgerei Maucher</strong>
                </div>
                <div class="carousel-item">
                  <span>Mit freundlicher Unterstützung</br> </span>
                  <strong>Stefan Joser Holzbau</strong>
                </div>
                <div class="carousel-item">
                  <span>Mit freundlicher Unterstützung</br> </span>
                  <strong>systemzwo group</strong>
                </div>
              </div>
            </div>
            <script src="vendor/js/bootstrap.bundle.min.js"></script>
          </div>
          <div class="col-7" style="padding-bottom: 10px;">
            <img src="img/hauptsponsoren.png" width="100%">
          </div>-->
        </div>
      </div>
    </footer>
    
    <!-- JS -->
    <script src="js/jquery-3.4.1.js"></script>
    <script>
      $(document).ready(function() {
        if(window.location.pathname.split(".")[1] == "html"){
          document.getElementById("stream").src = "stream.jpg";
        } else {
          refresh();
          setInterval(function() {
            refresh();
          }, 300000);
        }
      });
  
      function refresh() {
        $("#infoticker").load("infoticker.php");
        //$("#aufsicht").load("aufsicht.php");
      }      
    </script>
  </body>
</html>
