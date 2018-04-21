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
    <title>LE DOME</title>
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
<script language=javascript>
        var count=0;
        function as()
        {
            setTimeout("fun1()",2500);
        }
        function fun1()
        {
            var a =new Array("ff99cc","9933ff","009999","999966","gray","f9933");
            if(count<=6)
            {
                document.bgColor=a[count++];
                setTimeout("fun1()",2500);
            }
            else
            {
                count=0;
                as();
            }
        }
    </script>
</head>
<body bgcolor=#ff6699 onload=as()>
<div id="header">
<h1 style="color:#990099; font-family: Monotype Corsiva;" align="center"><b>LE DOME<br>BANQUET HALLS</b></h1>
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
</div>
<h3 ALIGN="center" class="navigator-links">
    <A HREF="home.php">HOME</A>&nbsp;||&nbsp;<A href="booking.php">BOOK HALL</A>&nbsp;||&nbsp;<A HREF="aboutus.php">ABOUT US</A>&nbsp;||&nbsp;<A HREF="gallery.php">GALLERY</A>&nbsp;||&nbsp;<A HREF="contact.php">CONTACT US</A>
</h3>
<MARQUEE HEIGHT="60%" DIRECTION="RIGHT" BEHAVIOUR="SCROLL" SCROLLAMOUNT="10" BGCOLOR="0000FA">WELCOME TO LEE DOME BANQUETS</MARQUEE>
<table>
    <tr>
        <td><IMG SRC="./New folder/458838493_a6271532bf_z.JPG" HEIGHT=300 WIDTH=400> </TD>
        <TD>&nbsp;&nbsp;&nbsp;</TD>
        <TD>&nbsp;&nbsp;&nbsp;</TD>
        <TD>&nbsp;&nbsp;&nbsp;</TD>
        <TD>&nbsp;&nbsp;&nbsp;</TD>
        <TD>&nbsp;&nbsp;&nbsp;</TD>
        <TD><H4 style="color: #990099; font-family: Monotype Corsiva;" align="center">WE SERVE :</H4>
            <TABLE BORDER=0BORDERCOLOR="0000FA">
                <TR>
                    <TD>
                        <ul style="list-style-type:disc">
                            <li>BUISNESS MEETINGS</LI>
                        </UL>
                    </TD>
                </TR>
                <TR>
                    <TD>
                        <ul style="list-style-type:disc">
                            <li>WEEDINGS</LI>
                        </UL>
                    </TD>
                </TR>
                <TR>
                    <TD>
                        <ul style="list-style-type:disc">
                            <li>BIRTHDAY SPECIALS</LI>
                        </UL>
                    </TD>
                </TR>
                <TR>
                    <TD>
                        <ul style="list-style-type:disc">
                            <li>PARTIES</LI>
                        </UL>
                    </TD>
                </TR>
            </TABLE>
        </TD>
        <TD>&nbsp;&nbsp;&nbsp;</TD>
        <TD>&nbsp;&nbsp;&nbsp;</TD>
        <TD>&nbsp;&nbsp;&nbsp;</TD>
        <TD>&nbsp;&nbsp;&nbsp;</TD>
        <TD>&nbsp;&nbsp;&nbsp;</TD>
        <TD>&nbsp;&nbsp;&nbsp;</TD>
        <TD><H4 style="color: #990099; font-family: Monotype Corsiva; border-bottom:thick dotted #ff0000" align="center" >FOLLOW US:</H4>
            <BR>
            <TABLE>
                <TR>
                    <TD><IMG SRC="./New folder/download.jpe" HEIGHT=50 WIDTH=50></TD>
                    <TD><IMG SRC="./New folder/download(1).jpe" HEIGHT=50 WIDTH=50></TD>
                    <TD><IMG SRC="./New folder/download(2).jpe" HEIGHT=50  WIDTH=50></TD>
                </TR>
            </TABLE>
    </TR>
    <tr>
        <td colspan=15 >
            <H5 style="color:white ;font-family:Monotype Corsiva;" align="center"><br>We Created best dinning experience for our guests</H5>
            <H4 style="color:white ;font-family:Monotype Corsiva;">Le Dome is a premiere event venue, conveniently located in east Oakville, Ontario. A family business with over 30 years of experience in the banquet industry.
    Our experienced professionals will give you and your guests an unforgettable experience. We are renowned for our world class cuisine, excellent service and careful attention to detail
    Le Dome has the perfect room for corporate affairs, business breakfasts, seminars, award presentations, Christmas & retirement parties and of course weddings like no other.
            </H4>
        </td>
    </tr>
</TABLE>
</body>
</html>
