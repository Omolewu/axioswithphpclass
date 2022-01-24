<?php
$host = "localhost";
$user = "root";
$pass = "";
$conn = new mysqli($host, $user, $pass, 'crud');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// $sql = "CREATE DATABASE IF NOT EXISTS crud";
// if (!$conn->query($sql) === TRUE) {
//     echo "Error creating database: " . $conn->error;
// }
