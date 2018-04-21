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
    <title>Booking CONFIRMATION</title>
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
        .table-button{
            border: none;
            padding: 10px 20px;
            display: inline-block;
            text-align: center;
            text-align: center;
            font-family: "Open Sans";
            font-size: 18px;
            cursor: pointer;
            transition-duration: 0.4s;
        }
        .table-button:hover{
            background-color: #0000fa;
            color: white;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
        }
        .navigator-links a:hover{
            color: #0000fa;
        }
    </style>
</head>
<body bgcolor="#f5f5dc" onload=as()>
<h1 style="color: #0000fa; font-family: Monotype Corsiva;" align="center"><b>LE DOME<br>BANQUET HALLS</b></h1>
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
if(isset($_SESSION['curuser'])) {
    $ser = "localhost";
    $us = "root";
    $pas = "";
    $conn = mysqli_connect($ser, $us, $pas, "banquethall");
    if (!$conn) {
        die("connection failed: " . mysqli_connect_error());
    }

    $bookingid = 1;
    $username = $_SESSION['curuserid'];
    $fullname = $_POST['bookingname'];
    $hallid = $_POST['bookingHall'];
    $dateofbooking = $_POST['bookingdate'];
    $noofguest = $_POST['bookingnoofguests'];
    $purpose = $_POST['bookingpurpose'];

    // To get Hall Name with Hall Id
    $sql2 = "SELECT `NAME`,`Base Rate`,`RATE per person` FROM `halldetails` WHERE ID='" . $hallid . "'";
    $result2 = mysqli_query($conn, $sql2);
    $hall = mysqli_fetch_row($result2);
    $hallname = $hall[0];

    $sql3 = "SELECT `bookingdate` FROM `avalibitydetails` WHERE hallid=".$hallid." and bookingdate='".$dateofbooking."'";
    $result3 = mysqli_query($conn, $sql3);
    if(mysqli_num_rows($result3) > 0)
    {
        $check = 0;
    }
    else
    {
        $check = 1;
    }

    if ($check == 1) {
        // To get count of total number of booking's for new booking id
        $sql1 = "SELECT COUNT(ID) FROM `bookingdetails`";
        $result1 = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result1) > 0) {
            $ans = mysqli_fetch_row($result1);
            $bookingid = $ans[0] + 1;
        }
        // echo $bookingid."<br>".$username."<br>".$fullname."<br>".$hallname."<br>".$dateofbooking."<br>".$noofguest."<br>".$purpose;
        echo "<br><div id='displaybookinginfo' align='center'>
<p style='font-size: 25px; color: #7a2518' align='center'><u><tt>**Entered Information Is As Follow's**</tt></u></p> 
<table border='1' cellpadding='10' cellspacing='1' style='text-align: center'>
<tr><th>Booking Id</th><td>$bookingid</td></tr>
<tr><th>Name</th><td>$fullname</td></tr>
<tr><th>Hall Chosen</th><td>$hallname</td></tr>
<tr><th>Booking Date</th><td>$dateofbooking</td></tr>
<tr><th>No. of People(approx)</th><td>$noofguest</td></tr>
<tr><th>Purpose</th><td>$purpose</td></tr>
<tr><th>Total Amont<br>Payble</th><td>Rs. " . ($noofguest * $hall[1] + $hall[2]) . "/-</td>
</table>
<form action='submitbooking.php' method='post'>
   <input type='hidden' id='bookingid2' name='bookingid2' value=".$bookingid.">
   <input type='hidden' id='bookinghallid' name='bookinghallid' value=".$hallid.">
   <input type='hidden' id='bookingdate' name='bookingdate' value=".$dateofbooking.">
   <input type='hidden' id='bookingguestamount' name='bookingguestamount' value=".$noofguest.">
   <input type='hidden' id='bookingpurpose' name='bookingpurpose' value='".$purpose."'>
   <p id='bookingid' value='".$bookingid."'></p>
<table align='center' border='0' cellpadding='10'>
   <p style='font-size: 12px'><tt>On clicking confirm your booking will be Confirmed<br>To edit your choice's click Make Changes</tt></p>
   <tr>
     <td><a href='booking.php'><input type='button' class='table-button' value='Make Changes'></a></td>
     <td><input type='submit' class='table-button' value='Confirm'></td>
   </tr>
</table>
</form>
</div>
    ";
    }
    else{
        echo "<br><br><div style='margin-left: 25px'><h4>Sorry!<br>Your Requested Dated \"<b>".$dateofbooking."</b>\" of booking isn't available for the \"<b>".$hallname."</b>\"<br>You may Choose our another Hall's or try another Date</h4>";
        echo "&nbsp;&nbsp;<a href='booking.php'><button class='table-button'>Make Changes</button></a></div>";
    }
}
else
{
    header("location: booking.php");
}
?>
</body>
</html>