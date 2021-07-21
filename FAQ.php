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
	</head>
	<body>
	<div>
	<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."navbar.php"); ?>
	</div>
	 <div class="container" style="margin-top: 100px">
		<div class="row">
			<div class="col-lg-12 mb-4 mt-2 text-center">
            <h2>FAQ</h2>
          	</div>
			<hr>
		  <div id="accordion1" role="tablist" style="width:100%">
			  <div class="card">
			    <div class="card-header" role="tab" id="headingOne1">
			      <h5 class="mb-0"> <a data-toggle="collapse" href="#collapseOne1" role="button" aria-expanded="true" aria-controls="collapseOne1"> Q1:  </a> </h5>
		        </div>
			    <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordion1">
			      <div class="card-body">Content for Accordion Panel 1</div>
		        </div>
		    </div>
			  <div class="card">
			    <div class="card-header" role="tab" id="headingTwo1">
			      <h5 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseTwo1" role="button" aria-expanded="false" aria-controls="collapseTwo1"> Q2:  </a> </h5>
		        </div>
			    <div id="collapseTwo1" class="collapse" role="tabpanel" aria-labelledby="headingTwo1" data-parent="#accordion1">
			      <div class="card-body">Content for Accordion Panel 2</div>
		        </div>
		    </div>
			  <div class="card">
			    <div class="card-header" role="tab" id="headingThree1">
			      <h5 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseThree1" role="button" aria-expanded="false" aria-controls="collapseThree1"> Q3: </a> </h5>
		        </div>
			    <div id="collapseThree1" class="collapse" role="tabpanel" aria-labelledby="headingThree1" data-parent="#accordion1">
			      <div class="card-body">Content for Accordion Panel 3</div>
		        </div>
		    </div>
			 <div class="card">
			    <div class="card-header" role="tab" id="headingFour1">
			      <h5 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseFour1" role="button" aria-expanded="false" aria-controls="collapseFour1"> Q4 </a> </h5>
		        </div>
			    <div id="collapseFour1" class="collapse" role="tabpanel" aria-labelledby="headingFour1" data-parent="#accordion1">
			      <div class="card-body">Content for Accordion Panel 4</div>
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
