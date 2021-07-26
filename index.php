<?php

include("getDB.php");

session_start();
// Include config file
require_once "config.php";
$result = $link->query("SELECT c_image FROM carousel");

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
  <link id="ThemeStyle" rel="stylesheet" href="./css/<?= $themefile_name ?>.css">
</head>

<body class="bodyIndex">
  <div>
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/assets/php/";
    include($IPATH . "navbar.php"); ?>
    <!-- Navbar -->
  </div>
  <?php

  if ($themefile_name == "halloween") {
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<div>";
    echo "<h1 class='halloween_text'> Happy Halloween </h1>";
    echo "</div";
  } else if ($themefile_name == "christmas") {
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<div>";
    echo "<h1 class='christmas_text'> Merry Christmas </h1>";
    echo "</div";
  }

  ?>
  <div class="container" style="margin-top: 100px">
    <div class="container mt-3">
      <div class="row">
        <div class="col-12">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <?php
              $i = 0;
              foreach ($result as $row) {
                $actives = '';
                if ($i == 0) {
                  $actives = 'active';
                }
              ?>
                <li data-target="#carouselExampleControls" data-slide-to="<?= $i; ?>" class="<?= $actives ?>"></li>
              <?php $i++;
              } ?>
            </ol>
            <div class="carousel-inner">
              <?php
              $i = 0;
              foreach ($result as $row) {
                $actives = '';
                if ($i == 0) {
                  $actives = 'active';
                }
              ?>
                <div class="carousel-item <?= $actives; ?>">
                  <img class="d-block w-100" src="<?= $row['c_image'] ?>">
                  <div class="carousel-caption d-none d-md-block">
                  </div>
                </div>
              <?php $i++;
              } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only" style="color:gray">Next</span>
            </a>
          </div>
        </div>
      </div>
      <hr>
    </div>
    <hr>
    <h2 class="text-center">RECOMMENDED PRODUCTS</h2>
    <hr>
    <div class="row">
      <?php
      $raw_results = mysqli_query($link, "SELECT p_id, p_image, p_name AS p_name FROM products
			  ORDER BY p_overallReview DESC LIMIT 6") or die(mysqli_error($link));

      if (mysqli_num_rows($raw_results) > 0) { // if one or more rows are returned do following
        while ($results = mysqli_fetch_array($raw_results)) {
          // puts data from database into array, while it's valid
          echo ' <div class="col-sm-4">
						<a class=" text-decoration-none" href="product.php?pid=' . $results['p_id'] . '">
						<div class="card" style="height: 300px">
							<img class="card-img-top" src="' . $results['p_image'] . '" style=" display: block; margin: auto; max-width: 200px; max-height:200px; overflow: hidden; object-position: 50% 50%; object-fit: contain;" alt="' . $results['p_name'] . '">
							<h5 class="product_title">' . $results['p_name'] . '</h5>
						</div>
						</a>
						</div>';
        }
      } else { // if there are no recommended products
        echo "No recommended products at the moment";
      }
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