<?php
include("getDB.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>EighteenTech: FAQ</title>
<meta charset="UTF-8">
  		<meta name="description" content="Technology reviews">
  		<meta name="keywords" content="appliances, tech, review, tv, mobile, headphone, laptop, phone">
  		<meta name="author" content="Nitin Ramesh">
 		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link id="ThemeStyle" rel="stylesheet" href="./css/<?= $themefile_name?>.css">
	</head>
	<body class="faqBody">
	<div>
	<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."navbar.php"); ?>
	</div>
	 <div class="container" style="margin-top: 100px">
		<div class="row">
			<div class="col-lg-12 mb-4 mt-2 text-center">
            <h2>Frequently Asked Questions</h2>
          	</div>
			<hr>
		  <div id="accordion1" role="tablist" style="width: 80%; margin:auto">
			  <div class="card">
			    <div class="card-header" role="tab" id="headingOne1">
			      <h5 class="mb-0"> <a data-toggle="collapse" href="#collapseOne1" role="button" aria-expanded="true" aria-controls="collapseOne1"> What is EighteenTech? </a> </h5>
		        </div>
			    <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordion1">
			      <div class="card-body"> Our website has various reviews from users for different product catogories that are available on BestBuy, NewEgg, Amazon. If you navigate to our Categories page you can find reviews for Cell Phones, Headphonees & Speakers, Cameras, TV & Home Theatres & Wearablee Technology and Smart Home. For each product you can see product specification, users review and ratings and a link to buy.</div>
		        </div>
		    </div>
			  <div class="card">
			    <div class="card-header" role="tab" id="headingTwo1">
			      <h5 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseTwo1" role="button" aria-expanded="false" aria-controls="collapseTwo1"> How to decide on which product to buy? </a> </h5>
		        </div>
			    <div id="collapseTwo1" class="collapse" role="tabpanel" aria-labelledby="headingTwo1" data-parent="#accordion1">
			      <div class="card-body">The best way is to browse through our categories and products. Read the product description, specification, user rating or reviews and then buy the product. Our Website has direct links to buy a product on bestbuy.ca, amazon.ca and newegg.ca if the product is available.</div>
		        </div>
		    </div>
			  <div class="card">
			    <div class="card-header" role="tab" id="headingThree1">
			      <h5 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseThree1" role="button" aria-expanded="false" aria-controls="collapseThree1"> How to add new product? </a> </h5>
		        </div>
			    <div id="collapseThree1" class="collapse" role="tabpanel" aria-labelledby="headingThree1" data-parent="#accordion1">
			      <div class="card-body">As of now only admin users can add new products, this is for security and privacy purposes. You can contact us with the product details: title, image link, description, specification, links to buy the product from. Our team will review the product legitimacy and add the product to our database. We will notify you once the product is added.</div>
		        </div>
		    </div>
			 <div class="card">
			    <div class="card-header" role="tab" id="headingFour1">
			      <h5 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseFour1" role="button" aria-expanded="false" aria-controls="collapseFour1"> How to review a product? </a> </h5>
		        </div>
			    <div id="collapseFour1" class="collapse" role="tabpanel" aria-labelledby="headingFour1" data-parent="#accordion1">
			      <div class="card-body"> Only registered users can review a product. So please make sure to register! To add a product review, first select a product from our categories. Then scroll down to the bottom... select the number of star rating and then add the review and submit. This should reflect the changes in our database. Congrats!! Nice now both registerd users, public and admin can see the review added.</div>
		        </div>
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
