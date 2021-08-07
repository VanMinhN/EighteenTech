<?php
include("getDB.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>EighteenTech: COVID-19</title>
<meta charset="UTF-8">
  		<meta name="description" content="Technology reviews">
  		<meta name="keywords" content="appliances, tech, review, tv, mobile, headphone, laptop, phone">
  		<meta name="author" content="Nitin Ramesh">
 		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link id="ThemeStyle" rel="stylesheet" href="./css/<?= $themefile_name?>.css">
	</head>
	<body class="covinfoBody">
	<div>
	<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."navbar.php"); ?>
	</div>
	 <div class="container" style="margin-top: 100px; background-color:white;">

			<div class="col-lg-12 mb-4 mt-2 text-center">
            <h2>COVID-19</h2>
      </div>

      <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="brief-tab" data-toggle="tab" href="#brief" role="tab" aria-controls="brief" aria-selected="true">Brief</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="stats-tab" data-toggle="tab" href="#stats" role="tab" aria-controls="statistics" aria-selected="false">Statistics</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="map-tab" data-toggle="tab" href="#map" role="tab" aria-controls="map" aria-selected="false">Map</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="brief" role="tabpanel" aria-labelledby="brief-tab">
      <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/covid19/"; include($IPATH."brief.php"); ?> <!-- COVID-19 brief -->
    </div>
    <div class="tab-pane fade" id="stats" role="tabpanel" aria-labelledby="stats-tab">
      <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/covid19/"; include($IPATH."statistics.php"); ?> <!-- COVID-19 stats -->
    </div>
    <div class="tab-pane fade" id="map" role="tabpanel" aria-labelledby="map-tab">
      <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/covid19/"; include($IPATH."map.php"); ?> <!-- COVID-19 map -->
    </div>
  </div>


  </div>
  <script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap-4.4.1.js"></script>
	</body>
	<div class="nobg">
	<?php include($IPATH."footer.html"); ?> <!-- Footer -->
		</div>
</html>
