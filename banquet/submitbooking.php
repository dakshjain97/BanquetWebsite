<?php
session_start();
?>
<style>
    .links a:hover
    {
        color: #0000bf;
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
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
<?php
$ser="localhost";
$us="root";
$pas="";
$conn = mysqli_connect($ser, $us, $pas, "banquethall");
if(!$conn){
    die("connection failed: " . mysqli_connect_error());
}
// collecting retrived data
$bookingid = $_POST['bookingid2'];
$hallid = $_POST['bookinghallid'];
$user = $_SESSION['curuserid'];
$date = $_POST['bookingdate'];
$guestsamount = $_POST['bookingguestamount'];
$purpose = $_POST['bookingpurpose'];

$check1 = false;
$check2 = false;

$sql1 = "INSERT INTO `bookingdetails`(`ID`, `hallid`, `username`, `DATE`, `NoOfGuests`, `Purpose`) VALUES (".$bookingid.",".$hallid.",'".$user."','".$date."',".$guestsamount.",'".$purpose."')";
$sql2 = "INSERT INTO `avalibitydetails`(`hallid`, `bookingdate`) VALUES (".$hallid.",'".$date."')";
if(mysqli_query($conn, $sql1))
    $check1=true;
else
    die(mysqli_error($conn));

if(mysqli_query($conn, $sql2))
    $check2=true;
else
    die(mysqli_error($conn));

if($check1==true){
    echo "<h2 align='center'>Thank You!<br>Your Booking has been Regestered, our Admin will contact you soon.</h2><br>";
    echo "<h4 class='links' align='center'>for any Querie's...<a href='contact.php'>Contact us</a></h4><br>";
    echo "<center><a href='home.php'><button class='link-button'>&nbsp;&nbsp;Go Back&nbsp;&nbsp;</button></a></center>";
}
?>
