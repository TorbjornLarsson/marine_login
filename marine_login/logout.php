<?php
session_start();

// Remove all session variables
session_unset();

if(session_destroy()) // Destroy all sessions
{
    header("Location: index.php"); // Redirect home
}
?>