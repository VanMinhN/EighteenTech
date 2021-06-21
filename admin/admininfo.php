<?php

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
if ($_SESSION["is_admin"] != true){
  header("location: ../user.php");
  exit;
}
?>
<div class="container">
	<h2>Admin Information</h2>
	<p >Name: <b><?php echo htmlspecialchars($_SESSION["first_name"])." ".htmlspecialchars($_SESSION["last_name"]); ?></b></p>
    	<p >Email address: <b><?php echo htmlspecialchars($_SESSION["emailaddress"]); ?></b></p>
    	<p>Admin priveleges: <b><?php echo htmlspecialchars($_SESSION["is_admin"]); ?></b></p>
</div>
