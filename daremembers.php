<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
    <title>Dare Members</title>
	<link rel="stylesheet" href="css/main.css" />
</head>

<body>
<!-- Content wrapper -->
    <div id="wrapper">
<!-- Banner Top -->
	<header id="top">
		<div><img src="img/header_nordic1.jpg" alt="banner top"/></div>
	</header>

<!-- navi menue top -->
	<div class="navi-top cf">
	<?php
		include ('PHP/navigation/navi-bar.php');
	?>
</div>
	
	<div class="content cf">
		<div class="primary-content">
		<h1>Dare Members</h1>
		

		<form action="daremembers.php" method="get">
		Firstname: <input type="text" name="textValue" Placeholder="Search">
		<input type="submit">


			<select id="country" name="country">
			<option>All</option>
<?php
	include ('PHP/Dropdown/countries.php');
?>
</select>


<p2>Roles</p2>
<select id="roles" name="roles" action="daremembers.php">
<option>All</option>

<?php
	include ('PHP/Dropdown/roles.php');
?>

</select>

<select id="hasteam" name="hasteam" action="daremembers.php">
Har du lag?
<option value="empty"></option>
<option value="yes">Yes</option>
<option value="no">No</option>
</select>

</form>
<table class="searchoutput">
	<tr>
		<th>Lastname</th>
		<th>Firstname</th>
		<th>Role</th>
		<th>Team</th>
	</tr>
	<?php 
		//Prints the results from the searchfunction query, based on values from the search boxes
		include ('PHP/search/searchfunction.php');
		
		while($row = mysqli_fetch_array($results)) {
			echo "<tr><td>" . $row['Lastname'] . "</td><td>" . " " . $row['Firstname'] . "</td><td>" . $row['Role'] . "</td><td>" . $row['Team'] . "</td></tr>"; 
		}
	?>
	</table>	
		</div><!-- primary content end-->	
	</div><!-- content end -->
	</div><!-- wrapper end -->
	
	<!-- footer wraper -->
	<div class="footer">
		<center>All images, videos, content Copyright © 2013 Dare to be Digital Limited except where noted. All Rights Reserved. <a href="mailto:enquiries@daretobedigital.com">enquiries@daretobedigital.com</a> <br />
		Website Design by MTC Media | Dare 2011 illustrations by Sooper Double D</center>
	</div><!-- footer end -->
	
</body>

</html>