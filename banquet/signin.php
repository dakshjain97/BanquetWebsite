<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <title>LOGIN</title>
    <script language=javascript>
        var count=0;
        function as()
        {
            setTimeout("fun1()",3000);
        }
        function fun1()
        {
            var a =new Array("ff99cc","9933ff","009999","999966","gray","green");
            if(count<=6)
            {
                document.bgColor=a[count++];
                setTimeout("fun1()",3000);
            }
            else
            {
                count=0;
                as();
            }
        }
    </script>
    <style>
        .tabledivision{
            margin-left: 500px;
        }
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
            alert("A User is Already Logged In.");
        }
    </script>
</head>
<body bgcolor=ff9933 onload=as()>
<h1 style="color: #0000fa; font-family: Monotype Corsiva;" align="center"><b>LE DOME<br>BANQUET HALLS</b></h1>
<?php
if(isset($_SESSION['curuser']))
{
    echo "<p align='right' class='header-login-section-text' onload='checkSession()'>Welcome <a href='userprofile.php'>".$_SESSION['curuser']."</a></p>";
}
else
{
    echo "<a href='signup.php'><button class='header-login-section-button'>Sign Up</button></a>";
}
?>
<h3 ALIGN="center" class="navigator-links">
    <A HREF="home.php">HOME</A>&nbsp;||&nbsp;<A href="booking.php">BOOK HALL</A>&nbsp;||&nbsp;<A HREF="aboutus.php">ABOUT US</A>&nbsp;||&nbsp;<A HREF="gallery.php">GALLERY</A>&nbsp;||&nbsp;<A HREF="contact.php">CONTACT US</A>
</h3>
<br><br>
<IMG SRC=".\New folder\seville-exterior.jpg" HEIGHT=300 WIDTH=300 align="left" style="margin-left: 100px">
<div id="login" class="tabledivision">
    <form  action="signin_success.php" autocomplete="on" method="post" align="center">
        <table border="0" cellpadding="5" cellspacing="1">
            <tr>
                <td colspan="2">
                    <h1>Log in</h1>
                </td>
            <tr>
                <td>USERNAME OR EMAIL</td>
                <td><input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/></td>
            </tr>
            <tr>
                <td>PASSWORD</td>
                <td><input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /></td>
            </tr>
            <tr>
                <td><input type="reset" value="Reset" /></td>
                <td><input type="submit" value="Login" /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <p><a href="signup.php"> Not a member yet ?&#8595;</a></p>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>