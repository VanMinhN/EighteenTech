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
            <h2>Browse</h2>
      </div></div>
      <?php
      // Initialize the session
      session_start();
      // Include config file
      require_once "config.php";
      //set page number
      if (!isset ($_GET['page']) ) {
        $page = 1;
      } else {
        $page = $_GET['page'];
      }

	$cat = $_GET['category'];
  $curr_page=$_GET['page'];
  if($curr_page == null){
    $curr_page=1;
  }
	// gets value sent over search form
  $cat = htmlspecialchars($cat);
		// changes characters used in html to their equivalents, for example: < to &gt;
    //if else to get name of the category
    $category="";
    if($cat == 101)
    {
      $category="Cell Phones";
    }
    else if($cat == 102)
    {
      $category="Headphones & Speakers";
    }
    else if($cat == 103)
    {
      $category="Cameras";
    }
    else if($cat == 104)
    {
      $category="TV & Home Theatres";
    }
    else if($cat == 105)
    {
      $category="Wearable Technology";
    }
    else if($cat == 106)
    {
      $category="Smart Home";
    }
    else {
    //  header("location: categories.php");
    //  exit;
    }
  echo "<p>Viewing ".$category." products <br/><hr/>";

  //getting data a page
  $results_per_page = 9;
  $page_first_result = ($page-1) * $results_per_page;

  $query = "select * from products where p_category=".$cat;
  $result = mysqli_query($link, $query);
  $number_of_result = mysqli_num_rows($result);

  //determine the total number of pages available
  $number_of_page = ceil ($number_of_result / $results_per_page);




  $query = "SELECT p_id, p_name, p_image FROM products where p_category=".$cat." LIMIT " . $page_first_result . ',' . $results_per_page;  //to be changed
  $result = mysqli_query($link, $query);

  echo '<div class="row">';
  while ($row = mysqli_fetch_array($result)) { //printing products on screen
    echo ' <div class="col-sm-4">
            <a class=" text-decoration-none" href="product.php?pid='.$row['p_id'].'">
              <div class="card" style="height: 300px">
                <img class="card-img-top" src="'.$row['p_image'].'" style=" display: block; margin-left: auto; margin-right: auto;max-width: 150px; max-height:250px; overflow: hidden; object-position: 50% 50%; object-fit: contain;" alt="'.$row['p_name'].'">
                <h5 class="card-title">'.$row['p_name'].'</h5>
              </div>
              </a>
            </div>';
  }
  echo '</div></br><hr/>';
  echo '<div>
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">';
  for($page = 1; $page<= $number_of_page; $page++) { //pagination
    if($curr_page ==$page){
               $isActive="active";
    }
    else{
      $isActive="";
    }
    echo '<li class="page-item '.$isActive.' "><a class="page-link" href = "browse.php?category='. $cat .'&page=' . $page . '">' . $page . ' </a></li>'; }
    echo '</ul>
      </nav>
    </div>';
?>
		</div>


		<div>
	<?php include($IPATH."footer.html"); ?> <!-- Footer -->
		</div>
<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap-4.4.1.js"></script>
	</body>
</html>
