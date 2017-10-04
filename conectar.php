<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "monitoreo_invernadero";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    	die("Connection fallida: " . $conn->connect_error);
}
?>