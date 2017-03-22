<?php
session_start(); // Start session
$error=''; // Error messages
if (isset($_POST['submit'])) {
if (empty($_POST['user_name']) || empty($_POST['password'])) {
    $error = "Username or Password is invalid";
}
else
{
    // Define $user_name and $password
    $user_name=$_POST['user_name'];
    $password=$_POST['password'];

    // Establish connection with server
    $connection = new mysqli("localhost", "root", "LIMS.2017.Uppsala");

    // Protect from MySQL injection
    $user_name = stripslashes($user_name);
    $password = stripslashes($password);
    $user_name = mysqli_real_escape_string($connection, $_POST['user_name']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Select database
    $db = mysqli_select_db($connection, "marine_user");

    // Fetch information of registered users.
    if ($result = mysqli_query($connection, "SELECT * FROM user WHERE password=md5('$password') AND user_name='$user_name'"));
      {
      // Return the number of rows in result set
      $rowcount=mysqli_num_rows($result);

      // Set user type
      $row = $result->fetch_assoc();
      $user_type=$row['user_type'];
      // Free result set
      mysqli_free_result($result);
      }

    // A matched user returns 1 row
    if ($rowcount == 1) {
        $_SESSION['login_user']=$user_name; // Initialize session
        $_SESSION['user_type']=$user_type;
        echo $_SESSION['user_type'];
        header("location: home.php"); // Redirecting
    } else {
        $error = "Username or Password is invalid";
    }

    mysqli_close($connection); // Close connection
    }
}
?>