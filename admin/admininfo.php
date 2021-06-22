
<div class="container">
	<h2>Admin Information</h2>
	<p >Name: <b><?php echo htmlspecialchars($_SESSION["first_name"])." ".htmlspecialchars($_SESSION["last_name"]); ?></b></p>
    	<p >Email address: <b><?php echo htmlspecialchars($_SESSION["emailaddress"]); ?></b></p>
    	<p>Admin priveleges: <b><?php echo htmlspecialchars($_SESSION["is_admin"]); ?></b></p>
</div>