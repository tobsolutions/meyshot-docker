<?php
$host='sqldb';
$user='root';
$pass='mc4hct';

$link_meyshot = mysqli_connect($host, $user, $pass, 'MEYSHOT');

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to MySQL server successfully!";
}
?>