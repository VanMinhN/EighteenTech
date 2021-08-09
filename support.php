<?php
include("getDB.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>EighteenTech: Support</title>
<meta charset="UTF-8">
  		<meta name="description" content="Technology reviews">
  		<meta name="keywords" content="appliances, tech, review, tv, mobile, headphone, laptop, phone">
  		<meta name="author" content="Nitin Ramesh">
 		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link id="ThemeStyle" rel="stylesheet" href="./css/<?= $themefile_name?>.css">
  </head>
	<body class="aboutusBody">
	<div>
	<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."navbar.php"); ?>
	</div>

    <div class="col-lg-12 mb-4 mt-2 text-center">
            <h2>Support</h2>
          </div>
    <div class="container">
    
        
	<h2>User Documentation</h2>
	<hr>

	
	
	 <h3> Profile Page </h3>
	     <li style="margin-left: 30px;">  In the profile page, the user can see their user information. </li> 
		 
		<br>	
	 <h3> Home Page </h3>
	<p>
		In the home page the both public and registered users can see the moving carousel of top product. They can also see top 6 recommended products. 
	</p>
	 
	 <br>
	 <h4> Categories </h4>
	 <p> In this page, both public and registered users can see six technology product categories </p>
	 <li style="margin-left: 30px;"> Cell Phones</li>
	 <li style="margin-left: 30px;"> Headphones & Speakers </li>
	 <li style="margin-left: 30px;"> Cameras </li>
	 <li style="margin-left: 30px;"> TV & Home Theatres </li>
     <li style="margin-left: 30px;">Wearable Technology </li>
     <li style="margin-left: 30px;"> Smart Home </li>
     

	 <br>
	 <h4> How to Register </h4>
	 <p> To register, click the login/signup button on home page, then click on sign up. Enter the following information: First name, last name, email, username, password, re-enter password and click register. Now your account should be created. You can login <p> 
	    
	 <br>
	 <h4> How to Login </h4>
	 <p> Once you have registered, you can login with your credentials and you would be redirceted to your user profile. To Login, click the login/signup button on home page, enter your name and password. </p>

</div>
      <br>
      <br>
      <br>
	<?php include($IPATH."footer.html"); ?> <!-- Footer -->
		</div>
<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap-4.4.1.js"></script>
	</body>
</html>
