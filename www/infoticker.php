<?php require("header.php");?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Infoticker</h1>
  </div>

    <table class="table table-striped">
        <tr>
            <th>Titel</th>
            <th>Text</th>
            <th>Startdatum</th>
            <th>Enddatum</th>
            <th>Ersteller</th>
        </tr>
        <?php
            require('dbconnect.php');
            $sql = 'SELECT * FROM Infoticker ORDER BY Startdatum ASC';
            $result = mysqli_query($link_meyshot_server, $sql);
            if ( ! $result )
            {
                die('Ungültige Abfrage: ' . mysqli_error());
            }

            while ($row = mysqli_fetch_array($result)) {
                echo '<tr ';
                if(time()>strtotime($row['Startdatum']) and time()<strtotime($row['Enddatum'])) {
                    echo 'class="active"';
                }
                echo '>';
                echo '<td>' . $row['Titel'] . '</td>';
                echo '<td>' . substr($row['Text'],0,100) . '</td>';
                echo '<td>' . date("d.m.Y H:i:s",strtotime($row['Startdatum'])) . '</td>';
                echo '<td>' . date("d.m.Y H:i:s",strtotime($row['Enddatum'])) . '</td>';
                echo '<td>' . $row['Ersteller'] . '</td>';
                echo '</tr>';
                echo time() . " " . strtotime($row['Startdatum']) . " " . strtotime($row['Enddatum']);
            }

            mysqli_free_result($result);
        ?>
    </table>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Hallo Welt!</h6>
    </div>
    
  </div>

</div>
<?php require("footer.php");?>