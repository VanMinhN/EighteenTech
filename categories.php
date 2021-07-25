<?php
include("getDB.php");
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
		<style>
			
		</style>
	</head>
	<body class="categoriesBody">
	<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."navbar.php"); ?>
		<div class="container" style="margin-top: 100px">
			<h2 class="text-center">Pick a category to start browsing</h2><br/><br/>
      <form action="browse.php">
		  <div class="row">
			  <div class="col-xl-4">
          <button name="category" value="101" class="btn btn-lg" type="submit">Cell Phones</button>
              </div>
			  <div class="col-xl-4">
          <button name="category" value="102" class="btn btn-lg" type="submit">Headphones & Speakers</button>
			  </div>
			  <div class="col-xl-4">
          <button name="category" value="103" class="btn btn-lg" type="submit">Cameras</button>
			  </div>
		    <div class="col-xl-4">
          <button name="category" value="104" class="btn btn-lg" type="submit">TV & Home Theatres</button>
			  </div>
		    <div class="col-xl-4">
          <button name="category" value="105" class="btn btn-lg" type="submit">Wearable Technology</button>
			  </div>
		    <div class="col-xl-4">
          <button name="category" value="106" class="btn btn-lg" type="submit">Smart home</button>
			  </div>
		  </div>
    </form>
        </div>
<script src="./js/jquery-3.4.1.min.js"></script>
	<script src="./js/popper.min.js"></script>
	<script src="./js/bootstrap-4.4.1.js"></script>
	</body>
</html>
