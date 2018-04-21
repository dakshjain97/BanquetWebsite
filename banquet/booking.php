<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<script>
	function check()
	{
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yy = today.getFullYear();
		
		var con=0;
		var result=true;
		var d=document.getElementById("bookingnoofguests");
		var dat=document.getElementById("bookingdate");
		var x=document.getElementById("bookingname");
		var y=document.getElementById("bookingHall");
		var p=document.getElementById("bookingpurpose");
		var val=dat.value;
		var yyenter=val.substr(0,4);
		var mmenter=val.substr(5,2);
		var ddenter=val.substr(8,2);
		var ddnew=parseInt(ddenter);
		var mmnew=Number(mmenter);
		var yynew=Number(yyenter);
		con=x.value.indexOf(" ");
			if(con==0 || con==-1)
			{
				alert("PLEASE ENTER YOUR FULL NAME");
				result=false;
			}
			else if((ddnew<dd) && (mmnew<=mm) && (yynew<=yy))
			{
				alert("BOOKING DATE CANT BE BEFORE CURRENT DATE");
				result=false;
			}
		return result;
	}
	</script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <title>BOOK HALL'S</title>
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
<body bgcolor="#f5f5dc" onload=as()>
<h1 style="color: #0000fa; font-family: Monotype Corsiva;" align="center"><b>LE DOME<br>BANQUET HALLS</b></h1>
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
<?php
if(isset($_SESSION['curuser'])) {
    ?>
    <div id="bookingpage">
        <form method="post" action="confirm_booking.php" autocomplete="on" onsubmit="return check()" align="center">
            <table border="0" cellpadding="10" cellspacing="10" align="center" bgcolor="#f0ffff">
                <caption><tt>Enter the Information Correctly, all field are compulsory</tt></caption>
                <tr>
                    <td colspan="2"><h2 align="center">Booking Details</h2>                    </td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input type="text" id="bookingname" name="bookingname" required></td>
                </tr>
                <tr>
                    <td>Select Hall</td>
                    <td>
                        <select id="bookingHall" name="bookingHall">
                            <option value="1">Ganges House</option>
                            <option value="2">The Divine Ini</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Date for Booking</td>
                    <td><input type="date" id="bookingdate" name="bookingdate" required></td>
                </tr>
                <tr>
                    <td>Estimated No. Of Guest's</td>
                    <td><input type="number" id="bookingnoofguests" name="bookingnoofguests" required></td>
                </tr>
                <tr>
                    <td>Purpose</td>
                    <td><input type="text" id="bookingpurpose" name="bookingpurpose" required></td>
                </tr>
                <tr>
                    <td><input type="reset" VALUE="Reset"></td>
                    <td><input type="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </div>
    <?php
}
else
{
    echo "<br><br><br>";
    echo "<h3 align='center'>You Need To Login First To Make Booking...<a href='signin.php'>click here</a></h3>";
}
?>
</body>
</html>