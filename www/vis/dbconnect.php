<?php
$hostssmdb2='sqldb';
$userssmdb2='root';
$passssmdb2='mc4hct';
$host='h2790537.stratoserver.net';
$user='meyshot';
$pass='*2Aj72zx';

$link_meyshot = mysqli_connect($host, $user, $pass, 'MEYSHOT');

$link_ssmdb2 = mysqli_connect($hostssmdb2, $userssmdb2, $passssmdb2, 'SSMDB2');

mysqli_set_charset($link_meyshot, "utf8")
?>