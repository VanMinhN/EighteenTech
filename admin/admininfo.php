
<div class="container">
	<h2>Admin Information</h2>
	<hr>
	<p >Name: <b><?php echo htmlspecialchars($_SESSION["first_name"])." ".htmlspecialchars($_SESSION["last_name"]); ?></b></p>
    	<p >Email address: <b><?php echo htmlspecialchars($_SESSION["emailaddress"]); ?></b></p>
    	<p>Admin privileges: <b><?php echo htmlspecialchars($_SESSION["is_admin"]); ?></b></p>
	<br>
	<h2>Website Status</h2>
	<hr>
	<table class="table">
  <thead>
    <tr>
      <th scope="col">Service</th>
      <th scope="col">Status</th>
	<th scope="col">Message</th>
  </thead>
  <tbody>
    <tr>
      <th scope="row">PHP</th>
			<?php
				//testing php version
				if(phpversion()){
					echo '<td><span class="badge badge-pill badge-success">Operational</span></td>';
					echo "<td>PHP v".phpversion()."</td>";
				}
				else{
					echo '<td><span class="badge badge-pill badge-warning">Not Operational</span></td>';
					echo "<td>Unable to get PHP version</td>";
				}
			?>

    </tr>
		<tr>
      <th scope="row">MySQLi extension</th>
			<?php
				//testing mysqli extension availability
				require_once "config.php";
				if(mysqli_get_client_info($link)){
					echo '<td><span class="badge badge-pill badge-success">Operational</span></td>';
					echo "<td>".mysqli_get_client_info($link)."</td>";
				}
				else{
					echo '<td><span class="badge badge-pill badge-warning">Not Operational</span></td>';
					echo "<td>Unable to find MySQLi extension</td>";
				}
			?>

    </tr>
    <tr>
      <th scope="row">SQL database</th>
			<?php
				//testing database connection
			 if($link){
				 echo '<td><span class="badge badge-pill badge-success">Operational</span></td>';
				 echo "<td>Connected</td>";
			 }
			 else{
				 echo '<td><span class="badge badge-pill badge-warning">Not Operational</span></td>';
				 echo "<td>Unable to connect to database</td>";
			 }
			 ?>

    </tr>
    <tr>
      <th scope="row">Covid-19 dataset</th>
			<?php
			$url = "https://github.com/CSSEGISandData/COVID-19/tree/master/csse_covid_19_data/csse_covid_19_daily_reports";

			// Use get_headers() function
			$headers = @get_headers($url);

			// Use condition to check the existence of URL
			if($headers && strpos( $headers[0], '200')) {
				echo '<td><span class="badge badge-pill badge-success">Operational</span></td>';
				echo "<td>Connected</td>";
			}
			else {
				echo '<td><span class="badge badge-pill badge-warning">Not Operational</span></td>';
				echo "<td>Unable to connect to dataset</td>";
			}
			?>
    </tr>
  </tbody>
</table>
</div>
