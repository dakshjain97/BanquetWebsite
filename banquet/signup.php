<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <meta charset="UTF-8">
    <title>SIGN UP</title>
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
    <script>
        function checkSession(name) {
            window.alert("A User is Already Logged In.");
        }
		function check1()
		{
			var result=true;
			var con=0;
			var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth()+1; //January is 0!
			var yy = today.getFullYear();
			var x=document.getElementById("signupname");
			var dat=document.getElementById("signupdob");
			var pass=document.getElementById("signuppassword");
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
			else if(pass.value.length<8)
			{
				alert("PASSWORD MUST BE ATLEAST 8 CHARACTERS LONG");
				result=false;
			}
		return result;
			
		}
    </script>
</head>
<body bgcolor="#f0f8ff">
<h1 style="color: #0000fa; font-family: Monotype Corsiva;"><center>LE DOME<br>BANQUET HALLS</center></H1>
<?php
if(isset($_SESSION['curuser']))
{
    echo "<p align='right' class='header-login-section-text' onload='checkSession()'>Welcome <a href='userprofile.php'>".$_SESSION['curuser']."</a></p>";
}
else
{
    echo "<a href='signin.php'><button class='header-login-section-button'>Sign In/Log In</button></a>";
}
?>
<h3 ALIGN="center" class="navigator-links">
    <A HREF="home.php">HOME</A>&nbsp;||&nbsp;<A href="booking.php">BOOK HALL</A>&nbsp;||&nbsp;<A HREF="aboutus.php">ABOUT US</A>&nbsp;||&nbsp;<A HREF="gallery.php">GALLERY</A>&nbsp;||&nbsp;<A HREF="contact.php">CONTACT US</A>
</h3>
<h1 align="center">SIGN UP</h1>
<form id="signupform" action="signup_success.php" onsubmit="return check1()" method="POST">
    <table id="signuptable" align="center" border="0" bgcolor="#faebd7" cellpadding="10" cellspacing="3">
        <caption><tt>All Fiels are necessary</tt></caption>
        <tr>
            <td>Enter Your username</td>
            <td><input type="text" id="signupusername" name="signupusername" required></td>
        </tr>
        <tr>
            <td>Enter Your Full Name</td>
            <td><input type="text" id="signupname" name="signupname" required></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" id="signuppassword" name="signuppassword" required></td>
        </tr>
        <tr>
            <td>ADDRESS</td>
            <td><input type="text" id="signupaddress" name="signupaddress" required></td>
        </tr>
        <tr>
            <td>Date of Birth: </td>
            <td><input type="date" id="signupdob" name="signupdob" required></td>
        </tr>
        <tr>
            <td>Occupation</td>
            <td><input type="text" id="signupoccupation" name="signupoccupation" required></td>
        </tr>
        <tr>
            <td align="center"><input type="submit" value="Submit"></td>
            <td align="center"><input type="reset" value="Reset"></td>
        </tr>
    </table>
</form>
<p align="center"><a href="signin.php">Already a Menber Sign In!</a></p>
</body>
</html>