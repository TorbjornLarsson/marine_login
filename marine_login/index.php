<?php
include('login.php'); // Include login script

if(isset($_SESSION['login_user'])){
    header("location: home.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login form</title>
        <link href="login_style.css" rel="stylesheet">
    </head>
    <body>
        <div id="main">
            <div id="login">
                <h1>Marine LIMS</h1>
                <form action="" method="post">
                    <label>User Name :</label>
                    <input id="name" name="user_name" placeholder="User name" type="text">
                    <label>Password :</label>
                    <input id="password" name="password" placeholder="**********" type="password">
                    <input name="submit" type="submit" value=" Login ">
                    <span><?php echo $error; ?></span>
                </form>
            </div>
        </div>
    </body>
</html>