<?php
    include("../dbconnect.php");
    $sql = "SELECT ScheibenID, Nachname, Vorname, Zeitstempel, Starterliste, Disziplin, Trefferzahl, TotalRing, TotalRing01, BesterTeiler01 FROM Scheiben WHERE Zeitstempel IN (SELECT Max(Zeitstempel) FROM `Scheiben` GROUP By StandNr) AND StandNr=" . $i . " ORDER BY StandNr";
    $result = mysqli_query($link_ssmdb2, $sql);
    while($row = mysqli_fetch_array($result)){
        echo $row[1];
        echo $row[2];
        echo $row[7];
    }
?>