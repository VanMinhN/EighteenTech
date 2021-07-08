
<div class="container">
	<h2>Product management</h2>
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
  // Initialize the session
  session_start();
  // Include config file
  require_once "config.php";
  //set page number
  //define total number of results you want per page

   //retrieve the selected results from database
   $query = "SELECT p_id, p_name, p_category, p_image FROM products ";
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




?>
</tbody>
</table>
</div>
