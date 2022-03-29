<?php
$host='sqldb';
$user='root';
$pass='mc4hct';

$link_meyshot = mysqli_connect($host, $user, $pass, 'MEYSHOT');

if(!$link_meyshot) {
    die('failed to connect to the server: ' . mysqli_connect_error());
}
?>