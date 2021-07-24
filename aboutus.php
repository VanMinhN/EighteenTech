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
  </head>
	<body>
	<div>
	<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."navbar.php"); ?>
	</div>
	 <div class="container" style="margin-top: 100px">
		<div class="row">
			<div class="col-lg-12 mb-4 mt-2 text-center">
            <h2>About this website</h2>
          </div>
			<p> Welcome to our technology products review website: EighteenTech. Our website has various reviews from users for different product catogories that are available on BestBuy, NewEgg, Amazon. If you navigate to our Categories page you can find reviews for Cell Phones, Headphonees & Speakers, Cameras, TV & Home Theatres & Wearablee Technology and Smart Home. For each product you can see product specification, users review and ratings and a link to buy. <br/><br/>

			</p>
		</div>
        <div class="row">
          <div class="col-lg-12 mb-4 mt-2 text-center">
            <h2>Developers</h2>
          </div>
        </div>
      </div>
      <div class="container ">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-12 text-center">
            <img class="rounded-circle" alt="140x140" style="width: 140px; height: 140px;" src="./images/nitin.png" data-holder-rendered="true">
            <h3>Nitin Ramesh </h3>
            <p class="aboutus_title">CS student</p>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 text-center">
            <img class="rounded-circle" alt="140x140" style="width: 140px; height: 140px;" src="./images/Charles.png" data-holder-rendered="true">
            <h3>Charles Corro</h3>
            <p class="aboutus_title">CS student</p>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 text-center">
            <img class="rounded-circle" alt="140x140" style="width: 140px; height: 140px;" src="./images/Keerthana.png" data-holder-rendered="true">
            <h3>Keerthana Madhaven</h3>
            <p class="aboutus_title">CS student</p>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 text-center">
            <img class="rounded-circle" alt="140x140" style="width: 140px; height: 140px;" src="./images/Carousel_Placeholder.png" data-holder-rendered="true">
            <h3>Bilal Sohail</h3>
            <p class="aboutus_title">CS student</p>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 text-center">
            <img class="rounded-circle" alt="140x140" style="width: 140px; height: 140px;" src="./images/Minh.png" data-holder-rendered="true">
            <h3>Van Minh Ngai</h3>
            <p class="aboutus_title">CS student</p>
          </div>
        </div>


      </div>
		<div>
	<?php include($IPATH."footer.html"); ?> <!-- Footer -->
		</div>
<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap-4.4.1.js"></script>
	</body>
</html>
