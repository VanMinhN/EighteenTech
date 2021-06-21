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
		<style>
			.btn-lg{
				text-align: center;
				width: 100%;
				border-color: #42f596;
			}
			.btn-lg:hover{

				border-color: #3bd985;
				background-color: #3bd985;
			}
			.row{
				border-collapse:separate;
                border-spacing:0 15px;
				padding-bottom: 1em;
			}
			.col-xl-4{
				padding-bottom: 1em;
			}
		</style>
	</head>
	<body>
	<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."navbar.php"); ?>
		<div class="container" style="margin-top: 100px">
			<h2 class="text-center">Pick a category to start browsing</h2><br/><br/>
		  <div class="row">
			  <div class="col-xl-4">
			    <button type="button" class="btn btn-lg">Cell phones</button>
              </div>
			  <div class="col-xl-4">
				  <button type="button" class="btn btn-lg">Headphones & Speakers</button>
			  </div>
			  <div class="col-xl-4">
				  <button type="button" class="btn btn-lg">Cameras</button>
			  </div>
		    <div class="col-xl-4">
				  <button type="button" class="btn btn-lg">TV & Home Theatres</button>
			  </div>
		    <div class="col-xl-4">
			  <button type="button" class="btn btn-lg">Wearable Technology</button>
			  </div>
		    <div class="col-xl-4">
			  <button type="button" class="btn btn-lg">Smart home</button>
			  </div>
		  </div>
        </div>
<script src="./js/jquery-3.4.1.min.js"></script>
	<script src="./js/popper.min.js"></script>
	<script src="./js/bootstrap-4.4.1.js"></script>
	</body>
</html>
