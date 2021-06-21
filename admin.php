<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if ($_SESSION["is_admin"] != true){
  header("location: user.php");
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
  		<link href="css/bootstrap-4.4.1.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div>
  <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."navbar.php"); ?> <!-- Navbar -->
</div>
	<!--
 -->
  <div class="row" style="margin-top:100px">
	  <div class="col-xl-3">
		  <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."admin_sidenav.html"); ?> <!-- Admin SideNav -->
	  </div>
	  <div class="col-xl-9">
		  <div class="tab-content" id="nav-tabContent">
      		<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
		  		 <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/admin/"; include($IPATH."admininfo.php"); ?> <!-- Admin info -->
			</div>
      <div class="tab-pane fade" id="list-users" role="tabpanel" aria-labelledby="list-users-list">Users</div>
      <div class="tab-pane fade" id="list-themes" role="tabpanel" aria-labelledby="list-themes-list">Themes</div>
      <div class="tab-pane fade" id="list-products" role="tabpanel" aria-labelledby="list-products-list">Products</div>
		<div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">Settings</div>
		<div class="tab-pane fade" id="list-carousel" role="tabpanel" aria-labelledby="list-carousel-list">Carousel content</div>
    </div>
	  </div>
</div>
<script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap-4.4.1.js"></script>
</body>
</html>
