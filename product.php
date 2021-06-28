<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
      		<meta name="description" content="Technology reviews">
      		<meta name="keywords" content="appliances, tech, review, tv, mobile, headphone, laptop, phone">
      		<meta name="author" content="Nitin Ramesh">
     		<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <h2>'.$row["p_name"].'</h2><br/>
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
          ';

        }
        ?>

			 </div>
      </div>
    </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-3.4.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script>
  <script src="js/bootstrap-4.4.1.js"></script>
  </body>
</html>
