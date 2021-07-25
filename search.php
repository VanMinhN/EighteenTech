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

<body class="searchBODY">
	<div>
		<?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/assets/php/";
		include($IPATH . "navbar.php");
		require_once "config.php"; ?>
	</div>
	<div class="container" style="margin-top: 100px">
		<div class="row">
			<div class="col-lg-12 mb-4 mt-2 text-center">
				<h2>Search results</h2>
			</div>
			<?php
			$query = $_GET['query'];
			//echo "<div > <h4>Searching for ".$query."</h4></div>";

			$min_length = 3;
			// you can set minimum length of the query if you want

			if (strlen($query) >= $min_length) { // if query length is more or equal minimum length then

				$query = htmlspecialchars($query);
				// changes characters used in html to their equivalents, for example: < to &gt;

				$query = mysqli_real_escape_string($link, $query);
				// makes sure nobody uses SQL injection
				//"SELECT id, title AS title FROM cars WHERE title LIKE '%$searchquery%' OR description LIKE '%$searchquery%'";
				$raw_results = mysqli_query($link, "SELECT p_id, p_image, p_name AS p_name FROM products
			WHERE p_name LIKE '%$query%' OR p_description LIKE '%$query%'") or die(mysqli_error($link));

				// '%$query%' is what we're looking for, % means anything, for example if $query is Hello
				// it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
				// or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'

				if (mysqli_num_rows($raw_results) > 0) { // if one or more rows are returned do following
					while ($results = mysqli_fetch_array($raw_results)) {
						// puts data from database into array, while it's valid it does the loop
						echo ' <div class="col-sm-4">
						<a class=" text-decoration-none" href="product.php?pid=' . $results['p_id'] . '">
						<div class="card" style="height: 300px">
							<img class="card-img-top" src="' . $results['p_image'] . '" style=" display: block; margin: auto; max-width: 200px; max-height:200px; overflow: hidden; object-position: 50% 50%; object-fit: contain;" alt="'. $results['p_name'] . '">
							<h5 class="product_title">' . $results['p_name'] . '</h5>
						</div>
						</a>
						</div>';
						// posts results gotten from database
					}
				} else { // if there is no matching rows do following
					echo "OH no, No results found for $query Try again!";
				}
			} else { // if query length is less than minimum
				echo "Enter minimum of $min_length characters to search";
			}
			// gets value sent over search form
			?>
		</div>
	</div>

	<div>
		<?php include($IPATH . "footer.html"); ?>
		<!-- Footer -->
	</div>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap-4.4.1.js"></script>
</body>

</html>