<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();

// Restart session but loggedin variable is false
session_start();
$_SESSION['loggedin'] = false;
 
// Redirect to login page
header("location: login.php");
exit;
?>