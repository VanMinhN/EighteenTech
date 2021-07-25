<div class="container">
	<h2>Product management</h2>

  <hr>
	<?php	  
		if(!empty($_POST['newProdName'])&&!empty($_POST['newProdImg'])&&!empty($_POST['newProdDescription'])&&!empty($_POST['newProdSpecs'])){
			$ProdName = htmlspecialchars(trim($_POST['newProdName']));
			$ProdImg =	htmlspecialchars(trim($_POST['newProdImg']));
			$ProdCat = htmlspecialchars(trim($_POST['newProductCategory']));
			$ProdDes = htmlspecialchars(trim($_POST['newProdDescription']));
			$ProdSpecs = htmlspecialchars(trim($_POST['newProdSpecs']));
			$AmazonLink = htmlspecialchars(trim($_POST['newAmazonLink']));
			$BBLink = htmlspecialchars(trim($_POST['newBBLink']));
			$NeweggLink = htmlspecialchars(trim($_POST['newNeweggLink']));
			
			$Imgpattern = '/(https?:\/\/.*\.(?:png|jpg))/i';
		
			if(preg_match($Imgpattern,$ProdImg) &&
			   (filter_var($AmazonLink, FILTER_VALIDATE_URL) || empty($AmazonLink)) &&
			   (filter_var($NeweggLink, FILTER_VALIDATE_URL)  || empty($NeweggLink)) &&
			   (filter_var($BBLink, FILTER_VALIDATE_URL)  || empty($BBLink))){
			
				// Prepare an insert statement
				$sql = "INSERT INTO products (p_category, p_name, p_image, p_description,p_specs, p_amazon, p_newegg, p_bestbuy) VALUES (?,?,?,?,?,?,?,?)";
				
				if($stmt = mysqli_prepare($link, $sql)){
					// Bind variables to the prepared statement as parameters
					mysqli_stmt_bind_param($stmt, "ssssssss",$param_cat , $param_name, $param_image, $param_description, $param_specs, $param_amazon, $param_newegg,$param_bestbuy);

					// Set parameters
					$param_cat = $ProdCat;
					$param_name = $ProdName;
					$param_image = $ProdImg;
					$param_description = $ProdDes;
					$param_specs = $ProdSpecs;
					$param_amazon = $AmazonLink;
					$param_newegg = $NeweggLink;
					$param_bestbuy = $BBLink;
					
					// Attempt to execute the prepared statement
					if(mysqli_stmt_execute($stmt)){
						
						echo "<p style='color:Green;'> Item Added!<br></p>";			
						
					} else{
						echo "<p style='color:red;'>Oops! Something went wrong. <br>";
						echo "Error: " . $sql . "<br>" . mysqli_error($link);
						echo "</p>"; 
					}


					// Close statement
					mysqli_stmt_close($stmt);
				}
			}
			else{
				if(!preg_match($Imgpattern,$ProdImg)){
					echo"<p style='color:red;'>*Improper input for Product Image Link*</p>";
				}
			    if(!filter_var($AmazonLink, FILTER_VALIDATE_URL)){
					echo"<p style='color:red;'>*Improper input for Product Amazon Link*</p>";
				}
			    if(!filter_var($BBLink, FILTER_VALIDATE_URL)){
					echo"<p style='color:red;'>*Improper input for Product BestBuy Link*</p>";
				}
			    if(!filter_var($NeweggLink, FILTER_VALIDATE_URL)){
					echo"<p style='color:red;'>*Improper input for Product Newegg Link*</p>";
					echo $NeweggLink;
				}	
			}		
			
			
		}
		else{
			if(empty($_POST['newProdName']) && isset($_POST['Submit'])){
				echo"<p style='color:red;'>*Product Name Required*</p>";
			}
			if(empty($_POST['newProdImg']) && isset($_POST['Submit'])){
				echo"<p style='color:red;'>*Product Image Required*</p>";
			}
			if(empty($_POST['newProdDescription']) && isset($_POST['Submit'])){
				echo"<p style='color:red;'>*Product Description Required*</p>";
			}
			if(empty($_POST['newProdSpecs']) && isset($_POST['Submit'])){
				echo"<p style='color:red;'>*Product Specifications Required*</p>";
			}	
		}
	  
	  ?>
	<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addNewProduct" >
		Add new product
	</button>
	<div class="modal" id="addNewProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog-lg modal-dialog-centered" style="margin-left:20%; margin-right: 20%" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add new product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form method="POST" action="">

			<div class="modal-body">
				<div class="row">
    			<div class="col">
						<label for="newProductName">Product Name</label>
						<div class="input-group mb-3">
							<input type="text" class="form-control" id="newProductName" name="newProdName">
						</div>
    			</div>
    			<div class="col">
						<label for="newProductImage">Product Image Link</label>
		  			<div class="input-group mb-3">
							<div class="input-group-prepend">
		    				<span class="input-group-text" id="newProductImage1">🔗</span>
		  				</div>
		    			<input name="newProdImg" type="text" class="form-control" id="newProductImage" aria-describedby="newProductImage1">
		  			</div>
    			</div>
  			</div>

				<label for="newProductDescription">Product Description</label>
				<div class="input-group">
  				<textarea id="newProductDescription" class="form-control" name="newProdDescription"></textarea>
				</div>
				<br>
				<label for="newProductSpecs">Product Specifications</label>
				<div class="input-group">
  				<textarea id="newProductSpecs" class="form-control" name="newProdSpecs"></textarea>
				</div>
				<br>
				<label for "newProductCategory">Product Category</label>
				<div class="input-group">
					<select name="newProductCategory" id="newProductCategory">
						<option value="101">Cellphones</option>
						<option value="102">Headphones & Speakers</option>
						<option value="103">Cameras</option>
						<option value="104">TVs & Home Theatres</option>
						<option value="105">Wearable Technology</option>
						<option value="106">Smart Home</option>
					</select>
				</div>
				<br>
				<div class="row">
    			<div class="col">
						<label for="newProductAmazon">Amazon Link</label>
		  			<div class="input-group mb-3">
							<div class="input-group-prepend">
		    				<span class="input-group-text" id="newProductAmazon1">🔗</span>
		  				</div>
		    			<input name="newAmazonLink" type="text" class="form-control" id="newProductAmazon" aria-describedby="newProductAmazon1">
		  			</div>
					</div>
					<div class="col">
						<label for="newProductBestBuy">BestBuy Link</label>
		  			<div class="input-group mb-3">
							<div class="input-group-prepend">
		    				<span class="input-group-text" id="newProductBestBuy1">🔗</span>
		  				</div>
		    			<input name="newBBLink" type="text" class="form-control" id="newProductBestBuy" aria-describedby="newProductBestBuy1">
		  			</div>
					</div>
					<div class="col">
						<label for="newProductNewegg">Newegg Link</label>
		  			<div class="input-group mb-3">
							<div class="input-group-prepend">
		    				<span class="input-group-text" id="newProductNewegg1">🔗</span>
		  				</div>
		    			<input name="newNeweggLink" type="text" class="form-control" id="newProductNewegg" aria-describedby="newProductNewegg1">
		  			</div>

					</div>
				</form>


			  </div>
			  <div class="modal-footer">
				<button type="submit" class="btn btn-primary" name="Submit">Submit</button>
			  </div>
			</form>
	  
			

    </div>
  </div>
</div>
<?php if(!empty($succMsg)): ?>
    <script type="text/javascript">
    $(document).ready(function(){
        $("#response").modal("show");
    });
    </script>
<?php endif; ?>

	<hr>
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Preview</th>
				<th scope="col">Product name</th>
				<th scope="col">Category</th>
				<th scope="col">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if ($_GET['page'] == 'manageprod') { // Initialize the session
				session_start();
				// Include config file
				require_once "config.php";
				//set page number
				if (!isset($_GET['view'])) {
					$view = 1;
				} else {
					$view = $_GET['view'];
				}
				//get current page
				$curr_page = $_GET['view'];
				if ($curr_page == null) {
					$curr_page = 1;
				}
				//define total number of results you want per page
				//getting data a page
				$results_per_page = 10;
				$page_first_result = ($view - 1) * $results_per_page;
				$query = "SELECT p_id, p_name, p_category, p_image FROM products";
				$result = mysqli_query($link, $query);
				$number_of_result = mysqli_num_rows($result);

				//determine the total number of pages available
				$number_of_page = ceil($number_of_result / $results_per_page);
				//retrieve the selected results from database

				//retrieve the selected results from database
				$query = "SELECT p_id, p_name, p_category, p_image FROM products LIMIT " . $page_first_result . ',' . $results_per_page;
				$result = mysqli_query($link, $query);

				//display the retrieved result on the webpage
				while ($row = mysqli_fetch_array($result)) {
					echo '<tr>
              <th scope="row">' . $row['p_id'] . '</th>
              <td><img src="' . $row['p_image'] . '" width="25px"></td>
              <td>' . $row['p_name'] . '</td>
              <td>' . $row['p_category'] . '</td>';
					echo '<td>
                <div class="dropdown">
                    <button type="button" class="btn btn-default" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i style="font-size:20px;" class="fa fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="/admin/removeproduct.php?userid=' . $row['p_id'] . '">Delete Product</a>
                    </div>
                </div>
            </td>';

					echo '</tr>';
				}
			}



			?>
		</tbody>
	</table>
	<?php
	if ($_GET['page'] == 'manageprod') {
		echo '<div>
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">';
		for ($page = 1; $page <= $number_of_page; $page++) { //pagination
			if ($curr_page == $page) {
				$isActive = "active";
			} else {
				$isActive = "";
			}
			echo '<li class="page-item ' . $isActive . ' "><a class="page-link" href = "admin.php?page=manageprod&view=' . $page . '">' . $page . ' </a></li>';
		}
		echo '</ul>
		</nav>
	</div>';
	}
	?>
</div>