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
	</head>
	<body>
	<div>
	<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."navbar.php"); ?>
	</div>
	 <div class="container" style="margin-top: 100px">
		<div class="row">
			<div class="col-lg-12 mb-4 mt-2 text-center">
            <h2>Browse</h2>
      </div>
      <?php
	$query = $_GET['category'];
	// gets value sent over search form
  $query = htmlspecialchars($query);
		// changes characters used in html to their equivalents, for example: < to &gt;
    //if else to get name of the category
    if($query == 101)
    {
      $query="Cell Phones";
    }
    else if($query == 102)
    {
      $query="Headphones & Speakers";
    }
    else if($query == 103)
    {
      $query="Cameras";
    }
    else if($query == 104)
    {
      $query="TV & Home Theatres";
    }
    else if($query == 105)
    {
      $query="Wearable Technology";
    }
    else if($query == 106)
    {
      $query="Smart Home";
    }
    else {
      header("location: categories.php");
      exit;
    }
  echo "<p>Viewing ".$query." products";
?>
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
