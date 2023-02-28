<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MeyShot VIS</title>
    <link href="vendor/css/bootstrap.min.css" rel="stylesheet">

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
    </style>
    <!-- Custom styles for this template -->
  </head>
  <body class="d-flex flex-column h-100">
    <!-- Begin page content -->
    <main class="flex-shrink-0">
      <div class="container-fluid">
        <div class="row" id="header-row">
          <class class="col-2">
            <img src="logo.png">
          </class>
          <div class="col-6">
            <span>aktuelle Aufsicht: <span id="aufsicht"></span></span>
          </div>
          <div class="col-2">
            <span>MeyShot VIS</span>
          </div>
        </div>
        <div class="row" id="content">
          <div class="col-9">
            <img style="width: 100%; height: auto;" src="http://192.168.10.222:8090/?action=stream" />
            <!--<img style="width: 100%; height: auto;" src="stream.jpg" />-->
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

    <footer class="footer mt-auto py-3 bg-light">
      <div class="container-fluid">
        <span class="text-muted">Place sticky footer content here.</span>
      </div>
    </footer>

    <!-- JS -->
    <script src="js/jquery-3.4.1.js"></script>
    <script>
      $(document).ready(function() {
          refresh();
          setInterval(function() {
          refresh();
          }, 10000);
      });
  
      function refresh() {
          $("#infoticker").load("infoticker.php");
          $("#aufsicht").load("aufsicht.php");
      }
      </script>
  </body>
</html>
