<?php
ob_start();
session_start();
// $mysqli = new mysqli('localhost', 'u244101586_mc', 'Mc191817@', 'u244101586_mc');
$mysqli = new mysqli('localhost', 'root', '', 'clean');


if ($mysqli->connect_error) {
    die($mysqli->connect_error);
}

?>

