<?php
require('dbconnect.php');
$sql = 'SELECT * FROM Infoticker WHERE Enddatum >= NOW() AND Startdatum <= NOW() ORDER BY Startdatum ASC';
$result = mysqli_query($link_meyshot, $sql);
if ( ! $result )
{
    die('Ungültige Abfrage: ' . mysqli_error());
}

while ($row = mysqli_fetch_array($result)) {
    echo '<div class="card">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $row['Titel'] . '</h5>';
    echo '<p class="card-text">';
    echo $row['Text'];
    echo '</p>';
    echo '</div>';
    echo '</div>';
}

mysqli_free_result($result);
?>