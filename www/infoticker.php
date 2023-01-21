<?php require("header.php");?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Infoticker</h1>
  </div>

  <table class="table table-bordered dataTable"">
    <tr>
      <th>Titel</th>
      <th>Text</th>
      <th>Startdatum</th>
      <th>Enddatum</th>
      <th>Ersteller</th>
    </tr>
    <?php
      require('dbconnect.php');
      $sql = 'SELECT * FROM Infoticker WHERE Enddatum >= NOW() ORDER BY Startdatum ASC';
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
          echo '<td>' . strip_tags(substr($row['Titel'],0,50)) . '</td>';
          echo '<td>' . strip_tags(substr($row['Text'],0,100)) . '</td>';
          echo '<td>' . date("d.m.Y H:i:s",strtotime($row['Startdatum'])) . '</td>';
          echo '<td>' . date("d.m.Y H:i:s",strtotime($row['Enddatum'])) . '</td>';
          echo '<td>' . $row['Ersteller'] . '</td>';
          echo '</tr>';
      }

      mysqli_free_result($result);
    ?>
  </table>

  <div class="mb-4">
    <a href="#" id="neuerEintrag" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Neuer Eintrag</a>
  </div>

  <form action="#" method="post" id="infoticker-form" style="display:none;">
    <div class="form-group">
      <input type="text" class="form-control" name="titel" id="titel" aria-describedby="emailHelp" placeholder="Titel">
    </div>
    <div class="form-group">
      <textarea class="form-control" name="text" id="text" placeholder="Text"></textarea>
    </div>
    <div class="form-group">
      <label class="form-check-label" for="startdatum">Startdatum</label>
      <input type="datetime-local" id="startdatum"
        name="startdatum" value="2023-06-12T19:30"
        min="2018-06-07T00:00" max="2028-06-14T00:00">
    </div>
    <div class="form-group">
      <label class="form-check-label" for="startdatum">Enddatum</label>
      <input type="datetime-local" id="enddatum"
        name="enddatum" value="2023-06-12T19:30"
        min="2018-06-07T00:00" max="2028-06-14T00:00">
    </div>
    <div class="form-check">
      <label for="ersteller">Ersteller</label>
      <select id="ersteller" name="ersteller">
        <option value="tobias.sailer">Tobias Sailer</option>
        <option value="thomas.sailer">Thomas Sailer</option>
        <option value="daniela.sperlich">Daniela Sperlich</option>
        <option value="david.sperlich">David Sperlich</option>
      </select>
    </div>
    <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Speichern</button>
  </form>

  <div class="mb-4">
      <div id="output_message" class="alert"></div>
  </div>
</div>
<?php require("footer.php");?>

<script>
  $(document).ready(function() {
    $('#neuerEintrag').on('click',function(e){   
      document.getElementById('infoticker-form').style.display = 'block';
    });
    $('#infoticker-form').on('submit',function(e){   
      var form = $(this); 
      $.ajax({
          url: "php/infoticker-form.php",
          method: form.attr('method'),
          data: form.serialize(),
          success: function( data ) {
              var dataJSON = JSON.parse(data);
              if( dataJSON.status == 'error' ) {
                  $('#output_message').addClass('alert-danger');
              } else {
                  $('#output_message').addClass('alert-success');
              }
              $('#output_message').text(dataJSON.message);  
          }
      });  
      return false;
    });
  });
</script>