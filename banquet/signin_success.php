<?php
session_start();
?>
<?php

$ser="localhost";
$us="root";
$pas="";
$conn=mysqli_connect($ser, $us, $pas, "banquethall");
if(!$conn){
    die("connection failed: " . mysqli_connect_error());
}
$name=$_POST["username"];
$password=$_POST["password"];
echo $name."<br>".$password."<br>";
$sql = "SELECT * FROM userlogin WHERE USERNAME='".$name."'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{

    $row = mysqli_fetch_row($result);
    if($password == $row[1]) {
        $sql = "SELECT NAME from clientdetails where Loginid='".$name."'";
        $result = mysqli_query($conn, $sql);
        $row1 = mysqli_fetch_row($result);
        $fullname = $row1[0];
        $_SESSION['curuser'] = $fullname;
        $_SESSION['curuserid'] = $_POST['username'];
        echo "<h3 align='center'>Logged In Successfully<br>";
        echo "Redirecting to Home Page<br></h3>";
        header("refresh:5; url=home.php");
    }
    else{
        echo "<h3 align='center'> PASSWORD Entered is incorrect Login Cancelled</h3><br>";
        echo "<h4 align='center'> Redirecting to Login Page</h4>";
        session_destroy();
        header("refresh:3, url=signin.php");
    }
}
else
{
    echo "<h3 align='center'> Username doest not exit's<br>Try Logging in with another username<br>If you dont have a account then SignUp<br> Redirecting to SignIN Page in 5 sec</h3>";
    header('refresh:5, url=signin.php');
}
?>