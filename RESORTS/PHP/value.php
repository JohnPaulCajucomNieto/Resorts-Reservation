<?php 

session_start();
$connection = mysqli_connect("localhost","root","","crystal_spring_reservations");

if(isset($_POST['submit'])){
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $room_type = $_POST['room_type'];


    $insert_query = "INSERT INTO reservations(full_name, email, phone, check_in, check_out, adults, children, room_type)
     VALUES('$full_name', '$email', '$phone', '$check_in', '$check_out', '$adults', '$children', '$room_type')";
    $insert_query_run = mysqli_query($connection, $insert_query);

    if($insert_query_run){
        $_SESSION['status'] = "Data Added!";
        header('location:index.php');
    }else{
        $_SESSION['status'] = "Data not added!";
        header('location: index.php');
    }

}

?>

