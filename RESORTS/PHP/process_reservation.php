<?php

$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'crystal_spring_reservations';

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$check_in = $_POST['check_in'];
$check_out = $_POST['check_out'];
$adults = $_POST['adults'];
$children = $_POST['children'];
$room_type = $_POST['room_type'];


$stmt = $conn->prepare("INSERT INTO reservations (full_name, email, phone, check_in, check_out, adults, children, room_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}


$stmt->bind_param("sssssiis", $full_name, $email, $phone, $check_in, $check_out, $adults, $children, $room_type);

if ($stmt->execute()) {
 
    header('location: form.php');
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>
