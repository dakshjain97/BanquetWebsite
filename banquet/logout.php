<?php
/**
 * Created by PhpStorm.
 * User: Harshit
 * Date: 11/26/2016
 * Time: 8:23 PM
 */
session_start();
?>
<?php
if(isset($_SESSION['curuser']))
{
    echo "<h1 align='center'>". $_SESSION['curuser']." Logged out Successfully.<br>Redirecting To Home</h1>";
    session_unset();
}
else
{
    echo "<h1 align='center'>There are No Logged In Session to be Logged out.<br>Redirecting To Home</h1>";
}
header("refresh:3, url=home.php");
?>
