<?php
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "crystal_spring_reservations"; 

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully"; 
}
?>



