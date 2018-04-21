<?php
session_start();
if(isset($_SESSION['curuser']))
{
    echo "<h3 align='center'> A Current User Account was Logged in.<br>Logged in Session was Destroyed<br></h3>";
    session_unset();
}
$ser="localhost";
$us="root";
$pas="";
$conn = mysqli_connect($ser, $us, $pas, "banquethall");
if(!$conn){
    die("connection failed: " . mysqli_connect_error());
}

echo "<h1 align='center'> Information Entered By You are as Follow's</h1><br>";
$username = $_POST['signupusername'];
$name = $_POST['signupname'];
$password = $_POST['signuppassword'];
$dob = $_POST['signupdob'];
$address = $_POST['signupaddress'];
$occupation = $_POST['signupoccupation'];
$clientid = 1;

// Query to get count of loginid's
$sql1 = "SELECT count(ID) FROM clientdetails";
$result = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result) > 0) {
    $count = mysqli_fetch_row($result);
    $clientid = (int)$count[0] + 1;
}

// Query to insert data into table ClientDetails
$check1 = false;
$check2 = false;
$sql1 = "INSERT INTO `clientdetails`(`ID`, `NAME`, `ADDRESS`, `DOB`, `Occupation`, `LoginId`) VALUES (".$clientid.",'".$name."','".$address."',(".$dob."),'".$occupation."','".$username."')";
if(mysqli_query($conn, $sql1)) {
    $check1 =true;
}
else
    echo mysqli_error($conn);

echo "<br>";
// Query to insert data in login details
$sql1 = "INSERT INTO `userlogin` VALUES ('".$username."','".$password."')";
if(mysqli_query($conn, $sql1))
    $check2 = true;
else
    echo mysqli_error($conn);

if($check1 == true and $check2 == true) {
    echo "<div align='center'>";
    echo "<h4> Your have successfully Signed UP<br> Details are as</h4>";
    echo "<table border='0' bgcolor='#f0f8ff' align='center' cellpadding='10' cellspacing='5'>";
    echo "<tr><td>Client Id</td><td>" . $clientid . "</td></tr>";
    echo "<tr><td>User Name</td><td>" . $username . "</td></tr>";
    echo "<tr><td>Name</td><td>" . $name . "</td></tr>";
    echo "<tr><td>Password</td><td>" . $password . "</td></tr>";
    echo "<tr><td>Date of Birth</td><td>" . $dob . "</td></tr><tr><td>Occupation:</td><td>" . $occupation . "</td></tr>";
    echo "<tr><td>Address</td><td>" . $address . "</td></tr>";
    echo "</table><br><h4>Redirecting to Home Page in 5 sec </h4></div>";
    $_SESSION['curuser'] = $name;
    header("refresh:5, url=home.php");
}
else
{
    header("refresh:2, url=signup.php");
}
?>