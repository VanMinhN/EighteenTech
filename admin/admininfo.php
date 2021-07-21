
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
      <td><span class="badge badge-success">Operational</span></td>
      <td>php version ...</td>
    </tr>
    <tr>
      <th scope="row">SQL database</th>
      <td><span class="badge badge-success">Operational</span></td>
      <td>sql message ...</td>
    </tr>
    <tr>
      <th scope="row">Covid-19 dataset</th>
      <td><span class="badge badge-success">Operational</span></td>
      <td>dataset message ...</td>
    </tr>
  </tbody>
</table>
</div>
