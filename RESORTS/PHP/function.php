<?php 

    require_once 'db_conn.php';

    function display(){
        global $con;
        $query = "SELECT * FROM reservations";
        $result = mysqli_query($con,$query);
        return $result;
    }
?>