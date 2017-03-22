<?php
// Establish connection with server
$connection = new mysqli("localhost", "root", "LIMS.2017.Uppsala");

// Select database
$db = mysqli_select_db($connection, "marine_user");

// Start and store session
session_start();
$user_check=$_SESSION['login_user'];

// Fetch user information
$ses_sql=mysqli_query($connection, "SELECT user_name FROM user WHERE user_name='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);

$login_session =$row['user_name'];
if(!isset($login_session)){
    mysqli_close($connection); // Close connection
    header('Location: index.php'); // Redirect
}
?>