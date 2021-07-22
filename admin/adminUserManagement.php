
<div class="container">
	<h2>User management</h2>
  <hr>
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">First name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email address</th>
      <th scope="col">Admin privileges</th>
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

	$query = "SELECT id, username, emailaddress, first_name, last_name, is_admin FROM users";
	$result = mysqli_query($link, $query);
	$number_of_result = mysqli_num_rows($result);

	//determine the total number of pages available
	$number_of_page = ceil ($number_of_result / $results_per_page);
//retrieve the selected results from database
	$query = "SELECT id, username, emailaddress, first_name, last_name, is_admin FROM users LIMIT " . $page_first_result . ',' . $results_per_page;  //to be changed
	$result = mysqli_query($link, $query);






   //display the retrieved result on the webpage
   while ($row = mysqli_fetch_array($result)) {
       echo '<tr>
              <th scope="row">'.$row['id'].'</th>
              <td>'.$row['username'].'</td>
              <td>'.$row['first_name'].'</td>
              <td>'.$row['last_name'].'</td>
              <td>'.$row['emailaddress'].'</td>';
              if($row['is_admin']==1){
                echo '<td>Yes</td>';
                if($row['username']!=$_SESSION["username"]){
                  echo '<td>
                        <div class="dropdown">
                          <button type="button" class="btn btn-default" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i style="font-size:20px;" class="fa fa-ellipsis-v"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/changepermissions.php?userid='.$row['id'].'&action='.$row['is_admin'].'">Revoke admin privileges</a>
                            <a class="dropdown-item" href="/removeuser.php?userid='.$row['id'].'">Delete admin</a>
                          </div>
                        </div>
                        </td>';
                }

              }
              else{
                echo '<td>No</td>';
                echo '<td>
                      <div class="dropdown">
                        <button type="button" class="btn btn-default" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i style="font-size:20px;" class="fa fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="/changepermissions.php?userid='.$row['id'].'&action='.$row['is_admin'].'">Give admin privileges</a>
                          <a class="dropdown-item" href="/removeuser.php?userid='.$row['id'].'">Delete user</a>
                        </div>
                      </div>
                      </td>';
              }

      echo '</tr>';
   }
?>
</tbody>
</table>
<?php
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
	echo '<li class="page-item '.$isActive.' "><a class="page-link" href = "admin.php?page=userman&view=' . $page . '">' . $page . ' </a></li>'; }
	echo '</ul>
		</nav>
	</div>';
?>
</div>
