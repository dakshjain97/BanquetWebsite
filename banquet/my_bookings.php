<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <title><?php
        if(isset($_SESSION['curuser']))
        {
            echo $_SESSION['curuser']." | Bookings";
        }
        else
        {
            header('location: signin.php');
        }?></title>
    <style>
        .header-login-section-text{
            margin-left: 30px;
            top: 0;
            right: 10px;
            position: fixed;
            text-align: center;
            font-family: "Open Sans";
            font-size: 25px;
        }
        .header-login-section-text a:hover{
            color: #0000bf;
        }
        .header-login-section-button{
            border: none;
            padding: 10px 20px;
            display: inline-block;
            text-align: center;
            margin: 30px;
            top: 0;
            right: 10px;
            position: fixed;
            text-align: center;
            font-family: "Open Sans";
            font-size: 18px;
            cursor: pointer;
            transition-duration: 0.4s;
        }
        .header-login-section-button:hover{
            background-color: #00fa00;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
        }
        .navigator-links a:hover{
            color: #0000fa;
        }

    </style>
</head>
<body>
<div id="header">
    <h1 style="color: #0000fa; font-family: Monotype Corsiva;" align="center"><b>LE DOME<br>BANQUET HALLS</b></h1>
</div>
<?php
if(isset($_SESSION['curuser']))
{
    echo "<p align='right' class='header-login-section-text'>Welcome <a href='userprofile.php'>".$_SESSION['curuser']."</a></p>";
}
?>
<h3 ALIGN="center" class="navigator-links">
    <A HREF="home.php">HOME</A>&nbsp;||&nbsp;<A href="booking.php">BOOK HALL</A>&nbsp;||&nbsp;<A HREF="aboutus.php">ABOUT US</A>&nbsp;||&nbsp;<A HREF="gallery.php">GALLERY</A>&nbsp;||&nbsp;<A HREF="contact.php">CONTACT US</A>
</h3>
<?php
$ser="localhost";
$us="root";
$pas="";
$conn=mysqli_connect($ser, $us, $pas, "banquethall");
if(!$conn){
    die("connection failed: " . mysqli_connect_error());
}
$sql2 = "SELECT `ID`, `hallid`, `username`, `DATE`, `NoOfGuests`, `Purpose` FROM `bookingdetails` WHERE username='".$_SESSION['curuserid']."'";
$result2 = mysqli_query($conn, $sql2);
echo "<div id='displayallbookings'>
<h3 style='margin-left: 15px'><u><i>Your All Booking's till Now</i></u></h3>
<table border='1' cellspacing='2' cellpadding='10' align='center' style='text-align: center; border-color: #1a1a1a'>
<tr>
<th>Booking Id</th><th>Hall</th><th>Date of Booking</th><th>No of Guests</th><th>Purpose</th><th>Total Amount</th>
</tr>";
if(mysqli_num_rows($result2) > 0) {
    while($row = mysqli_fetch_row($result2))
    {
        $sql1 = "SELECT `NAME`,`Base Rate`,`RATE per person` FROM `halldetails` WHERE ID='".$row[1]."'";
        $result1 = mysqli_query($conn, $sql1);
        $hall = mysqli_fetch_row($result1);
        echo "<tr>
                 <td>".$row[0]."</td><td>".$hall[0]."</td><td>".$row[3]."</td><td>$row[4]</td><td>$row[5]</td><td>Rs. ".($row[4] * $hall[1] + $hall[2])."</td>
            </tr>";
    }
    echo "</table></div>";
}
else
{
    echo "<h2 align='center'>Sorry!<br>You Have No Booking's<br>To make a booking<a href='booking.php'>...Click here</a></h2>";
}
?>>