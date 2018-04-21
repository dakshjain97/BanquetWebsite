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
    <title>About Le Dome</title>
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
        .link-button{
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
        .link-button:hover{
            background-color: #0000fa;
            color: white;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
        }
    </style>
</head>
<BODY bgcolor="#f0ffff">
<div id="NameTag">
    <h1 style="color: #0000fa; font-family: Monotype Corsiva;" align="center">LE DOME<br>BANQUET HALLS</H1>
</div>
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
<div align="center">
    <h3 align="center">SERVER UNDER MAINTAINCE<BR>WILL BE BACK SOON</h3>
    <a href='home.php'><button class='link-button'>&nbsp;&nbsp;Go Back&nbsp;&nbsp;</button></a>
</div>
</BODY>
</HTML>