<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "membres";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Erreur de connexion à la base de données : " . mysqli_connect_error());
}
?>
