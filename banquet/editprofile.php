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
        }?> - Edit Profile</title>
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
	<script>
	function check1()
		{
			var result=true;
			var con=0;
			var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth()+1; //January is 0!
			var yy = today.getFullYear();
			var x=document.getElementById("namehere");
			var dat=document.getElementById("datehere");
			var val=dat.value;
			var yyenter=val.substr(0,4);
			con=x.value.indexOf(" ");
			if(con==0 || con==-1)
			{
				alert("PLEASE ENTER YOUR FULL NAME");
				result=false;
			}
			else if(yyenter>(yy-18))
			{
				alert("SORRY BUT ONLY ADULTS ARE PERMITTED");
				result=false;
			}
			else if(yyenter<1900)
			{
				alert("YEAR OF BIRTH CANT BE LESS THAN 1900");
				result=false;
			}
		return result;
			
		}
	</scipt>
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
?>
<h3 ALIGN="center" class="navigator-links">
    <A HREF="home.php">HOME</A>&nbsp;||&nbsp;<A href="booking.php">BOOK HALL</A>&nbsp;||&nbsp;<A HREF="aboutus.php">ABOUT US</A>&nbsp;||&nbsp;<A HREF="gallery.php">GALLERY</A>&nbsp;||&nbsp;<A HREF="contact.php">CONTACT US</A>
</h3>
<?php
$ser = "localhost";
$us = "root";
$pas = "";
$conn = mysqli_connect($ser, $us, $pas, "banquethall");
if (!$conn) {
    die("connection failed: " . mysqli_connect_error());
}
$sql2 = "SELECT  `name`, `address`, `dob`, `occupation` FROM clientdetails` WHERE username='" . $_SESSION['curuserid'] . "'";
$result2 = mysqli_query($conn, $sql2);
if (mysqli_num_rows($result2) > 0)
{
$row = mysqli_fetch_row($result2)
?>
    <form action="update.php" onsubmit="return check()" method="post">
        name:<input type="text" id="namehere" name="m1" placeholder="<?php echo $row[0] ?>">
        address:<input type="text" name="m2" placeholder="<?php echo $row[1] ?>">
        dob:<input type="date" id="datehere" name="m3" placeholder="<?php echo $row[2] ?>">
        occupation:<input type="text" name="m4" value="<?php echo $row[3] ?>">
        <input type="submit" value="update">
    </form>
<?php
}
?>
</BODY>
</HTML>