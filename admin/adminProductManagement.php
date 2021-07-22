
<div class="container">
	<h2>Product management</h2>
  <hr>

	<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addNewProduct">
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
			<form>

      <div class="modal-body">
				<div class="row">
    			<div class="col">
						<label for="newProductName">Product Name</label>
						<div class="input-group mb-3">
							<input type="text" class="form-control" id="newProductName" >
						</div>
    			</div>
    			<div class="col">
						<label for="newProductImage">Product Image Link</label>
		  			<div class="input-group mb-3">
							<div class="input-group-prepend">
		    				<span class="input-group-text" id="newProductImage1">🔗</span>
		  				</div>
		    			<input type="text" class="form-control" id="newProductImage" aria-describedby="newProductImage1">
		  			</div>
    			</div>
  			</div>

				<label for="newProductDescription">Product Description</label>
				<div class="input-group">
  				<textarea id="newProductDescription" class="form-control"></textarea>
				</div>
				<br>
				<label for="newProductSpecs">Product Specifications</label>
				<div class="input-group">
  				<textarea id="newProductSpecs" class="form-control"></textarea>
				</div>
				<br>
				<div class="row">
    			<div class="col">
						<label for="newProductAmazon">Amazon Link</label>
		  			<div class="input-group mb-3">
							<div class="input-group-prepend">
		    				<span class="input-group-text" id="newProductAmazon1">🔗</span>
		  				</div>
		    			<input type="text" class="form-control" id="newProductAmazon" aria-describedby="newProductAmazon1">
		  			</div>
					</div>
					<div class="col">
						<label for="newProductBestBuy">BestBuy Link</label>
		  			<div class="input-group mb-3">
							<div class="input-group-prepend">
		    				<span class="input-group-text" id="newProductBestBuy1">🔗</span>
		  				</div>
		    			<input type="text" class="form-control" id="newProductBestBuy" aria-describedby="newProductBestBuy1">
		  			</div>
					</div>
					<div class="col">
						<label for="newProductNewegg">Newegg Link</label>
		  			<div class="input-group mb-3">
							<div class="input-group-prepend">
		    				<span class="input-group-text" id="newProductNewegg1">🔗</span>
		  				</div>
		    			<input type="text" class="form-control" id="newProductNewegg" aria-describedby="newProductNewegg1">
		  			</div>
					</div>
				</div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
		</form>

    </div>
  </div>
</div>

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
  if($_GET['page']=='manageprod'){// Initialize the session
  session_start();
  // Include config file
  require_once "config.php";
	//set page number
	if (!isset ($_GET['view']) ) {
		$view = 1;
	} else {
		$view = $_GET['view'];
	}
	//get current page
	$curr_page=$_GET['view'];
	if($curr_page == null){
		$curr_page=1;
	}
	//define total number of results you want per page
	//getting data a page
	$results_per_page = 10;
	$page_first_result = ($view-1) * $results_per_page;
	$query = "SELECT p_id, p_name, p_category, p_image FROM products";
	$result = mysqli_query($link, $query);
	$number_of_result = mysqli_num_rows($result);

	//determine the total number of pages available
	$number_of_page = ceil ($number_of_result / $results_per_page);
//retrieve the selected results from database

   //retrieve the selected results from database
   $query = "SELECT p_id, p_name, p_category, p_image FROM products LIMIT " . $page_first_result . ',' . $results_per_page;
   $result = mysqli_query($link, $query);

   //display the retrieved result on the webpage
   while ($row = mysqli_fetch_array($result)) {
       echo '<tr>
              <th scope="row">'.$row['p_id'].'</th>
              <td><img src="'.$row['p_image'].'" width="25px"></td>
              <td>'.$row['p_name'].'</td>
              <td>'.$row['p_category'].'</td>';
        echo '<td>
                <div class="dropdown">
                    <button type="button" class="btn btn-default" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i style="font-size:20px;" class="fa fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Edit product</a>
                      <a class="dropdown-item" href="#">Delete Product</a>
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
if($_GET['page']=='manageprod'){
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
	echo '<li class="page-item '.$isActive.' "><a class="page-link" href = "admin.php?page=manageprod&view=' . $page . '">' . $page . ' </a></li>'; }
	echo '</ul>
		</nav>
	</div>';
}
?>
</div>
