<?php
require('dbconnect.php');
$sql = 'SELECT * FROM Scheiben WHERE Nachname <> "" AND CONVERT(Zeitstempel, GETDATE()) = GETDATE() ORDER BY Zeitstempel, Nachname, Vorname DESC LIMIT 50';
$result = mysqli_query($link_ssmdb2, $sql);
if ( ! $result )
{
    die('Ungültige Abfrage: ' . mysqli_error());
}

echo '<div class="card">';
echo '<div class="card-body">';
echo '<h5 class="card-title">Ergebnisse des Tages</h5>';
echo '<p class="card-text">';
while ($row = mysqli_fetch_array($result)) {
    echo '<b>' . $row['Nachname'] . ' ' . $row['Vorname'] . '</b> ' . $row['TotalRing']/10 . ' (' . $row['TotalRing01']/10 . ')</br>';

}
echo '</p>';
echo '</div>';
echo '</div>';

mysqli_free_result($result);
?>