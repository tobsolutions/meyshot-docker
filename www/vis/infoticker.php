<?php
require('dbconnect.php');
$sql = 'SELECT * FROM Infoticker WHERE Enddatum >= NOW() AND Startdatum <= NOW() ORDER BY Startdatum ASC';
$result = mysqli_query($link_meyshot, $sql);
if ( ! $result )
{
    die('Ungültige Abfrage: ' . mysqli_error());
}

while ($row = mysqli_fetch_array($result)) {
    echo '<div class="card" width="100%">';
    echo '<div class="card-header">';
    echo '<h6>' . $row['Titel'] . '</h6>';
    echo '</div>';
    echo '<div class="card-body">';
    echo $row['Text'];
    echo '</div>';
    echo '</div>';
}

mysqli_free_result($result);
?>