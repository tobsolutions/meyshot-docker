<?php
require('dbconnect.php');
$sql = 'SELECT * FROM Scheiben ORDER BY Zeitstempel DESC LIMIT 50';
$result = mysqli_query($link_ssmdb2, $sql);
if ( ! $result )
{
    die('Ungültige Abfrage: ' . mysqli_error());
}

echo '<div class="card">';
echo '<div class="card-body">';
echo '<h5 class="card-title">Ergebnisse des Tages</h5>';

while ($row = mysqli_fetch_array($result)) {
   
    echo '<p class="card-text">';
    echo $row['Nachname'] . ' ' . $row['Vorname'] . '(' . $row['StandNr'];
    echo '</p>';

}

echo '</div>';
echo '</div>';

mysqli_free_result($result);
?>