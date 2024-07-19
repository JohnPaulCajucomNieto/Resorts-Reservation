<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $stmt->bind_param("ssssiiis", $full_name, $email, $phone, $check_in, $check_out, $adults, $children, $room_type);
    
    if ($stmt->execute()) {
        $message = "";
        header('Location: admin.php');
    } else {
        $message = "Submission failed. Please try again.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../PICTURE/lg.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/style1.css">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <title>Reservation Form</title>
</head>
<body>

<nav class="navbar">
    <img style="box-shadow: none;" class="logo" src="../PICTURE/lg.png" alt="" srcset="">
    <a href="../PHP/form.php"> <span class="reserve">RESERVE</span></a>
    <a href="#contact"> CONTACT US</a>
    <a href="../HTML/index.html">GALLERY</a>
    <a href="../HTML/index.html">ACCOMMODATION</a>
    <a href="../HTML/index.html">FACILITIES</a>
    <a href="../HTML/index.html">EVENTS</a>
    <a href="../HTML/index.html">HOME</a>
</nav>

<div class="container">
    <h2 class="bg" style="background-color: orangered; font-style: oblique;">CRYSTAL SPRING RESORT RESERVATION FORM</h2>

    <?php
    if (isset($message)) {
        echo "<p>$message</p>";
    }
    ?>

    <form action="../PHP/form.php" method="POST">
        <div class="form-group">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required>
        </div>
        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>
        </div>

        <div class="form-group">
            <label for="check_in">Check-in Date:</label>
            <input type="date" id="check_in" name="check_in" required>
        </div>
        <div class="form-group">
            <label for="check_out">Check-out Date:</label>
            <input type="date" id="check_out" name="check_out" required>
        </div>
        <div class="form-group">
            <label for="adults">Number of Adults:</label>
            <input type="number" id="adults" name="adults" required>
        </div>
        <div class="form-group">
            <label for="children">Number of Children:</label>
            <input style="width: 99.6%;" type="number" id="children" name="children" required>
        </div>

        <div class="form-group">
            <label for="room_type">Room Type:</label>
            <select style="width: 103%; height: 45px;" id="room_type" name="room_type" required>
                <option value="standard">Single Deluxe</option>
                <option value="deluxe">Double Deluxe</option>
            </select>
        </div>

        <div class="form-group">
            
        <button style="width: 103%; position: relative; right: 250px;" class="submit" value="submit" type="button" onclick="submit()">SUBMIT</button>
        
        </div>
    </form>
</div>

<footer id="contact" style="margin-top: 80px; width: 1613px; height: 400px; margin-bottom: -50px; margin-left: -100px; font-family: Arial, Helvetica, sans-serif;">
    <div class="foot">
        <ul style="margin-left: 200px; list-style: none; font-size: 13px; padding-top: 40px ; ">
            <h4 style="padding-top: 50px; font-size:15px ;">BE UPDATED</h4>
            <hr class="custom-hr" style="margin-left: -2px; margin-top: -18px; width: 50px; margin-bottom: 20px;">
            <li style="color: gray;" >Crystal Spring Resort: A Serene Oasis <br>Of Luxury Amidst Nature's Splendor</li><br>
            <li style="color: gray;">At Crystal Spring Resort, you'll be<br> surrounded by lush, verdant landscapes,<br> with the calming sounds of flowing water<br> and birdsong creating a tranquil ambience.</li>
        </ul>
        <div class="foot" style="margin-top: -240px; margin-left: 350px; font-size: 13px;">
            <ul style="margin-left: 250px; list-style: none; color: gray;">
                <h4 style="padding-top: 70px; font-size: 15px; color: white;">DISCOVER CRYSTAL SPRING RESORT</h4>
                <hr class="custom-hr" style="margin-left: -2px; margin-top: -18px; width: 50px; margin-bottom: 20px;">
                <li>EVENTS</li>
                <li>FACILITIES</li>
                <li>ACCOMMODATION</li>
                <li>GALLERY</li>
                <li>CONTACT US</li>
            </ul>
            <div class="foot" style="margin-top: -210px; margin-left: 350px; font-size: 13px;">
                <ul style="margin-left: 280px; list-style: none; color: gray;  ">
                    <h4 style="padding-top: 70px; font-size: 15px; color: white;">SPECIAL OFFERS</h4>
                    <hr class="custom-hr" style="margin-left: -2px; margin-top: -18px; width: 50px; margin-bottom: 20px;">
                    <li>EVENTS</li>
                    <li>FACILITIES</li>
                    <li>ACCOMMODATION</li>
                </ul>
            <div class="foot" style="margin-top: -174px; margin-left: 270px; font-size: 13px;">
                <ul style="margin-left: 250px; list-style: none; color: gray;">
                    <h4 style="padding-top: 65px; font-size:15px ; color: white;">GET IN  TOUCH</h4>
                    <hr class="custom-hr" style="margin-left: -2px; margin-top: -18px; width: 50px; margin-bottom: 20px;">
                    <li>Mallorca, San Leonardo, Nueva Ecija, Philippines<br> 1966
                        Reservations / Resort Mobile No.:<br> 
                        +63917.706.9136 (Monday-Sunday, 8:00am-6:00pm)
                        +63968.871.4516<br>  (Monday-Sunday, 8:00am-10:00pm)
                        <br> Email: crystal@acuaticoresort.com</li>
                </ul>
                <div class="iconse">
                    <a href="https://www.facebook.com/"><ion-icon name="logo-facebook"></ion-icon></a>
                    <a href="https://www.google.com.ph/?gws_rd=ssl"><ion-icon name="logo-google"></ion-icon></a>
                    <a href="https://www.instagram.com/?hl=en"><ion-icon name="logo-instagram"></ion-icon></a>
                    <a href="https://twitter.com/"><ion-icon name="logo-twitter"></ion-icon></a>
                </div>
                <h4 style="margin-left: -300px; color: gray; font-size: 12px; margin-top: 5px; " >&copy; 2023 CRYSTAL SPRING RESORT - ALL RIGHTS RESERVED.</h4>
            </div>
        </footer>
       </div>
      <a href="#"> <i style='font-size:25px; color: white; background-color: rgb(31, 27, 27); padding: 5px 5px 5px 5px; margin-left: -300px; margin-top: 1830px;' class='fas'>&#xf106;</i></a> 
   
      <script type="text/javascript">
        window.__be = window.__be || {};
        window.__be.id = "6515701d4b44160007c6317b";
        (function() {
            var be = document.createElement('script'); be.type = 'text/javascript'; be.async = true;
            be.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.chatbot.com/widget/plugin.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(be, s);
        })();
    </script>
    
    <script>
         function submit() {
        alert("SUBMITTED SUCCESSFULLY!");
    }
    </script>
</body>
</html>
