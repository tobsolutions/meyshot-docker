<?php
    $id = $_POST['id'];
    $titel = $_POST['titel'];
    $text = $_POST['text'];
    $startdatum = $_POST['startdatum'];
    $enddatum = $_POST['enddatum'];
    $ersteller = $_POST['ersteller'];

    $response = array();
    if (true) {
        $response['message'] = 'Daten nicht gespeichert! Fehler: ' . "";
        $response['status'] = 'error';
    } else {
        $response['message'] = 'Daten erfolgreich gespeichert.';
        $response['status'] = 'success';
    }
    echo json_encode($response);
?>