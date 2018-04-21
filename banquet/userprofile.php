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
            echo $_SESSION['curuser'];
        }
        else
        {
            header('location: signin.php');
        }?> - Profile</title>
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
        .usefullButtons{
            border: none;
            padding: 10px 20px;
            display: inline-block;
            text-align: center;
            font-family: "Open Sans";
            font-size: 18px;
            cursor: pointer;
            margin-right: 40px;
            transition-duration: 0.4s;
        }
        .usefullButtons:hover{
            background-color: #00fa00;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
        }
        .usefullbuttondiv{
            right: 10px;
        }
    </style>
</head>
<body>
<div id="header">
    <h1 style="color: #0000fa; font-family: Monotype Corsiva;" align="center"><b>LE DOME<br>BANQUET HALLS</b></h1>
</div>
<a href='logout.php'><button class='header-login-section-button'>Sign Out/Log Out</button></a>
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
$sql = "SELECT `ID`, `NAME`, `ADDRESS`, `DOB`, `Occupation`, `LoginId` FROM `clientdetails` WHERE LoginId='".$_SESSION['curuserid']."'";
$sql2 = "SELECT `PASSWORD` FROM `userlogin` WHERE USERNAME='".$_SESSION['curuserid']."'";
$sql3 = "SELECT COUNT(ID) FROM `bookingdetails` WHERE username='".$_SESSION['curuserid']."'";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_row($result);
    $userpassword = mysqli_fetch_row($result2);
    if($result3)
    {
        $totalbooking = mysqli_fetch_row($result3);
    }
    else
        $totalbooking = 0;
    ?>
    <div id="userdetails">
        <h1 style="margin-left: 20px; color: slateblue"> <b><i>Le Dome Client Details</i></b> </h1>
        <table border="0" align="center" cellpadding="10" cellspacing="10">
            <tr>
                <td rowspan="8"><img src="./profilepictures/#.jpg" width="250" height="250" alt="<?php echo $row[5] ?> Profile Picture"></td>
                <th>Name</th>
                <td><h4><?php echo $row[1]; ?></h4></td>
                <!-- <td><a href='my_bookings.php'><button class="usefullButtons">My Booking's</button></a></td> -->
            </tr>
            <tr>
                <th>LoginId/Username</th>
                <td><h4><?php echo $row[5] ?></h4></td>
                <td><a href='my_bookings.php'><button class="usefullButtons">My Booking's</button></a></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><h4><?php echo $userpassword[0] ?></h4></td>
                <td><a href='editprofile.php'><button class="usefullButtons">&nbsp;&nbsp;Edit Profile&nbsp;&nbsp;</button></a></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><h4><?php echo $row[2]?></h4></td>
                <td><a href='deleterecord.php'><button class="usefullButtons">&nbsp;&nbsp;&nbsp;Delete Me&nbsp;&nbsp;&nbsp;</button></a></td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td><h2><?php $row[3]?></h2></td>
            </tr>
            <tr>
                <th>Occupation</th>
                <td><h4><?php echo $row[4] ?></h4></td>
            </tr>
        </table>
    </div>
    <?php
}
else
{
    echo mysqli_error($conn);
}
?>
</body>
</html>