<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
      		<meta name="description" content="Technology reviews">
      		<meta name="keywords" content="appliances, tech, review, tv, mobile, headphone, laptop, phone">
      		<meta name="author" content="Nitin Ramesh">
     		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--FOR THE STARS-->

	<style>
		/* Base setup */
		@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
		@import url(//pro.fontawesome.com/releases/v5.15.0/css/all.css);
		
		/* Ratings widget */
		.rate {
			display: inline-block;
			border: 0;color: #777777;
		}
		/* Hide radio */
		.rate > input {
			display: none;
		}
		/* Order correctly by floating highest to the right */
		.rate > label {
			float: right;
		}
		/* The star of the show */
		.rate > label:before {
			display: inline-block;
			font-size: 2rem;
			padding: .3rem .2rem;
			margin: 0;
			cursor: pointer;
			font-family: FontAwesome;
			content: "\f005 "; /* full star */
			
		}

		/* Half star trick */
		.rate .half:before {
			content: "\f089 "; /* half star no outline */
			position: absolute;
			padding-right: 0;
		}
		/* Click + hover color */
		input:checked ~ label, /* color current and previous stars on checked */
		label:hover, label:hover ~ label { color: #58d090;  } /* color previous stars on hover */

		/* Hover highlights */
		input:checked + label:hover, input:checked ~ label:hover, /* highlight current and previous stars */
		input:checked ~ label:hover ~ label, /* highlight previous selected stars for new rating */
		label:hover ~ input:checked ~ label /* highlight previous selected stars */ { color: #25a087;  } 	
	</style>
        <?php
        // Initialize the session
        session_start();
        // Include config file
        require_once "config.php";
        //set product number``
        if (!isset ($_GET['pid']) ) {
          header("location:javascript://history.go(-1)"); //go back to previous page
          exit;
        } else {
          $pid = htmlspecialchars($_GET['pid']); //to avoid XSS injection
        }
		
		//query the database to get the average review score
		$OverallReview = 0;
		$query = "select * from reviews where p_id=".$pid;
		$result = mysqli_query($link, $query);
		$review_cnt = $result->num_rows;
		$reviewNum = $review_cnt;
		//call and print all forms from database
		if ($result && ($review_cnt>0)){
			while($row = mysqli_fetch_assoc($result)){
				$OverallReview += $row['rating'];
			}
			$OverallReview = $OverallReview/$review_cnt;
		}
		else{
			echo "<p>There are no Reviews on this product..</p>";
		}
		
		//send updated overall review in products table
		$query = "UPDATE products SET p_overallReview=".(round($OverallReview))." WHERE p_id=".$pid;
		$result = mysqli_query($link, $query);

		//call and print all forms from database
		if ($result && ($review_cnt>0)){
		}
		else{
			echo "<p>There are no Reviews on this product..</p>";
		}
		
        // query to get product info
        $query = "select * from products where p_id=".$pid;
        $result = mysqli_query($link, $query);
        $row_cnt = $result->num_rows;
        if($row_cnt!=1) //go back if product not found or more that 1 product found (unlikely)
        {
          header("location:javascript://history.go(-1)");
          exit;
        }
        while ($row = mysqli_fetch_array($result)) {
          echo '<title>EighteenTech: '.$row["p_name"].'</title>';
          echo '  <!-- Bootstrap -->
        	       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
                 </head>
                 <body>
                  <div>';
          $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."navbar.php");
          echo '</div>
        	<!-- body code goes here -->
          <div class="container" style="margin-top:100px">
            <div style="margin:20px">
               <button type="button" onclick="window.history.back();" class="btn btn-secondary">Go Back</button>
            </div>
      	  <div>
      		<div class="row">
      		  <div class="col-xl-4">';
          echo '<img src="'.$row['p_image'].'" class="img-fluid" alt="'.$row['p_name'].'" style=" display: block; margin-left: auto; margin-right: auto;max-width: 150px; max-height:250px; overflow: hidden; object-position: 50% 50%; object-fit: contain;">
          </div>
   		  <div class="col-xl-8">
          <h2>'.$row["p_name"].'</h2>
			<p id="stars">';

			for($num=0;$num<($OverallReview)/2;$num++){
					if (($OverallReview/2)-$num == 0.5){
						echo'<i style="color:#58d090;" class="fas fa-star-half"></i>';
						
					}
					else{
						echo'<i style="color:#58d090;" class="fas fa-star"></i>';
					}					
			}
			
		  echo '('.($review_cnt).')</p>
          <p>'.nl2br($row["p_description"]).'</p>
          <hr/>
  		    <div class="row">
          ';
          //bestbuy Button
          if($row['p_bestbuy']!="")
          {echo '<div class="col-xl-4">
				  <a type="button" style="width:100%" href="'.($row['p_bestbuy']).'" class="btn btn-primary">BestBuy.ca</a>
              </div>';}
          //Amazon canada Button
          if($row['p_amazon']!="")
          {echo '<div class="col-xl-4">
   				  <a type="button" style="width:100%" href="'.$row['p_amazon'].'" class="btn btn-secondary">Amazon.ca</a>
                 </div>';}
          //Newegg Button
          if($row['p_newegg']!="")
          {echo '		<div class="col-xl-4">
            <a type="button" style="width:100%" href="'.$row['p_newegg'].'" class="btn btn-warning">Newegg.ca</a>
                </div>';}
          echo '</div>
            </div>
  	    </div>
  			  <hr/>
  		  <div>
  			  <h3>Specification</h3><br/>
          <p>'.nl2br($row['p_specs']).'</p>
		 </div><hr>
          ';
        }
        ?>
		

		<?php
		echo "<div id='reviews'><h3 >Reviews</h3><br/>";
		
		$_SESSION['pid'] = $pid;
		
		if(!empty($_SESSION['loggedin'])){
			echo '
				<form id="form" action = "review.php" method="post" >
					<div id = "rating">
						<label>Rating:</label><br>
						<fieldset class="rate" id="product_rating">
							<input type="radio" id="rating10" name="rating" value="10" /><label for="rating10" title="5 stars"></label>
							<input type="radio" id="rating9" name="rating" value="9" /><label class="half" for="rating9" title="4 1/2 stars"></label>
							<input type="radio" id="rating8" name="rating" value="8" /><label for="rating8" title="4 stars"></label>
							<input type="radio" id="rating7" name="rating" value="7" /><label class="half" for="rating7" title="3 1/2 stars"></label>
							<input type="radio" id="rating6" name="rating" value="6" /><label for="rating6" title="3 stars"></label>
							<input type="radio" id="rating5" name="rating" value="5" /><label class="half" for="rating5" title="2 1/2 stars"></label>
							<input type="radio" id="rating4" name="rating" value="4" /><label for="rating4" title="2 stars"></label>
							<input type="radio" id="rating3" name="rating" value="3" /><label class="half" for="rating3" title="1 1/2 stars"></label>
							<input type="radio" id="rating2" name="rating" value="2" /><label for="rating2" title="1 star"></label>
							<input type="radio" id="rating1" name="rating" value="1" /><label class="half" for="rating1" title="1/2 star"></label>
						</fieldset>
					</div>
					<div id = "review">
						<label>Review:</label><br>
						<textarea name="review" maxlength= "500" placeholder="500 character limit"></textarea>
					</div>
					<div id = "submit">
						<input type="submit" value="Submit" name="submit" onclick="return window.location.reload();">
					</div>
				</form>			
			';
		}
		
		$query = "select * from reviews where p_id=".($pid)." ORDER BY post_time LIMIT 10;";
		$result = mysqli_query($link, $query);
		$review_cnt = $result->num_rows;
		//call and print all forms from database
		if ($result && ($review_cnt>0)){
			while($row = mysqli_fetch_assoc($result)){
				$StarNum = $row['rating']/2;
				
				echo"<hr><div id='comment'>";
				echo'		<p id="stars">';
				for($num=0;$num<$StarNum;$num++){
					if ($StarNum-$num == 0.5){
						echo'<i style="color:#58d090;" class="fas fa-star-half"></i>';
						
					}
					else{
						echo'<i style="color:#58d090;" class="fas fa-star"></i>';
					}					
				}
				echo'</p>';
				echo'		<p><b>'.($row['username']).'</b> at '.($row['post_time']).'</p>';
				echo'		<p>&nbsp&nbsp&nbsp&nbsp&nbsp'.($row['comment']).'</p>';
				echo"</div>";
			}
			
			if($reviewNum > 10){
				echo '	<a href="comments.php">See all comments...</a>
				';
			}
		}
		else{
			echo "<p>There are no Reviews on this product..</p>";
		}
		echo"</div>";	
		?>
		
			
      </div>
    </div>
	
	<!-- JavaScript to fix the star icons for the reviews and the overall rating of the product-->
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-3.4.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script>
  <script src="js/bootstrap-4.4.1.js"></script>
  </body>
</html>
