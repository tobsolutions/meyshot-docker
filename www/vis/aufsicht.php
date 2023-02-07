<?php
require('dbconnect.php');
$sql = 'SELECT `User`.`Name` FROM `Aufsichten`,`User` WHERE `User`.ID=Aufsichten.User AND `Ende` IS NULL';
$result = mysqli_query($link_meyshot, $sql);

while ($row = mysqli_fetch_array($result)) {
    echo $row[0];
}

mysqli_free_result($result);
?>