<?php
session_start();
?>
<?php
if(isset($_SESSION['curuser']))
{
    $ser="localhost";
    $us="root";
    $pas="";
    $conn=mysqli_connect($ser, $us, $pas, "banquethall");
    if(!$conn){
        die("connection failed: " . mysqli_connect_error());
    }
    $sql1 = "DELETE FROM `userlogin` WHERE username='".$_SESSION['curuserid']."'";
    $sql2 = "DELETE FROM `clientdetails` WHERE LoginId='".$_SESSION['curuserid']."'";
    if(mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2))
    {
        echo "<h1 align='center'>". $_SESSION['curuser']."RECORD DELETED SUCCESSULLY.<br>FOR FURTHER QUERY <a href='contact.php'>CONTACT US</a><br>Redirecting To Home</h1>";
        session_unset();
        header("refresh:3, url=home.php");
    }
    else
    {
        echo mysqli_error($conn);
    }
}
else
{
    echo "<h1 align='center'>There are No Logged In Session to be Deleted.<br>Redirecting To Sigin Page</h1>";
    header("refresh:3, url=home.php");
}
?>
