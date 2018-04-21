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
    <title>Gallery</title>
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
<BODY bgcolor=ffffaa>
<h1 style="color:ff6666;font-family:Monotype Corsiva;" align="center">LE DOME<BR>BANQUET HALLS</h1>
<?php
if(isset($_SESSION['curuser']))
{
    echo "<p align='right' class='header-login-section-text'>Welcome <a href='userprofile.php'>".$_SESSION['curuser']."</a></p>";
}
else
{
    echo "<a href='signin.php'><button class='header-login-section-button'>Sign In/Sign Up</button></a>";
}
?>
<h3 ALIGN="center" class="navigator-links">
    <A HREF="home.php">HOME</A>&nbsp;||&nbsp;<A href="booking.php">BOOK HALL</A>&nbsp;||&nbsp;<A HREF="aboutus.php">ABOUT US</A>&nbsp;||&nbsp;<A HREF="gallery.php">GALLERY</A>&nbsp;||&nbsp;<A HREF="contact.php">CONTACT US</A>
</h3>
<br>
<h1 style="color:800040 ;font-family:Monotype Corsiva;" align="center">GALLERY</h1>
<div style="max-width:1000px; margin-left: 450px" onload="carousel()">
    <img class="mySlides" src="./New%20folder/bk2.jpg" style="width:50%" alt="slide1">
    <img class="mySlides" src="./New%20folder/GoFC2-82275-41599.jpg" style="width:50%" alt="siide2">
    <img class="mySlides" src="./New%20folder/Banquet-Hall.jpg" style="width:50%" alt="slide3">
    <img class="mySlides" src="./New%20folder/55b406d16a100d8e49b2657ad0d9e146.jpg" style="width:50%" alt="slide4">
    <img class="mySlides" src="./New%20folder/seville-exterior.jpg" style="width:50%" alt="slide5">
</div>
<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 4000); // Change image every 2 seconds
    }
</script>
</BODY>
</HTML>