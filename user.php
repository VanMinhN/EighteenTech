<?php
// Initialize the session
session_start();
include("getDB.php");
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if ($_SESSION["is_admin"] == true){
  header("location: admin.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>EighteenTech</title>
  <meta charset="UTF-8">
    		<meta name="description" content="Technology reviews">
    		<meta name="keywords" content="appliances, tech, review, tv, mobile, headphone, laptop, phone">
    		<meta name="author" content="Nitin Ramesh">
   		<meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <link id="ThemeStyle" rel="stylesheet" href="./css/<?= $themefile_name?>.css">
</head>
<body class="userBODY">
  <div>
  <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."navbar.php"); ?> <!-- Navbar -->
</div>
  <div class="container" style="margin-top: 100px; display: block;
  margin-left: auto;
  margin-right: auto;
  text-align: center;">
    <h2>User Information</h2>
    <p >Name: <b><?php echo htmlspecialchars($_SESSION["first_name"])." ".htmlspecialchars($_SESSION["last_name"]); ?></b></p>
    <p >Email address: <b><?php echo htmlspecialchars($_SESSION["emailaddress"]); ?></b></p>
    <p>Admin priveleges: <b><?php echo htmlspecialchars($_SESSION["is_admin"]); ?></b></p>
        <!--a href="./reset-password.php" class="btn btn-warning">Reset Your Password</a-->


  </div>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap-4.4.1.js"></script>
</body>
</html>
