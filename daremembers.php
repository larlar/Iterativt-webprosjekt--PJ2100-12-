<?php include("header.php") ?>
		<!-- content holder -->
		<div class="content cf">
		<!-- primary content -->
			<h1>Dare Members</h1>
				<form action="daremembers.php" method="get">
					<p2>Firstname:</p2> <input type="text" name="textValue" Placeholder="Search">
					<select id="country" name="country">
						<option>All</option>
							<?php include ('PHP/Dropdown/countries.php');?>
					</select>
							
					<p2>Roles</p2>
					<select id="roles" name="roles" action="daremembers.php">
						<option>All</option>
							<?php include ('PHP/Dropdown/roles.php');?>
					</select>
					<select id="hasteam" name="hasteam" action="daremembers.php">
						<option value="empty"></option>
						<option value="yes">Yes</option>
						<option value="no">No</option>
					</select>
					<input type="submit">
				</form>
				<table class="searchoutput">
					<tr>
						<th>Lastname</th>
						<th>Firstname</th>
						<th>Email</th>
						<th>Role</th>
						<th>Team</th>
						<th>Country</th>
					</tr>
					<?php 
						//Prints the results from the searchfunction query, based on values from the search boxes
						include ('PHP/search/searchfunction.php');
						
						while($row = mysqli_fetch_array($results)) {
							echo "<tr><td>" . $row['Lastname'] . "</td><td>" . $row['Firstname'] . "</td><td>" 
							. $row['Email'] . "</td><td>" . $row['Role'] . "</td><td>" . $row['Team'] . "</td><td>" . $row['Country']
							. "</td></tr>"; 
						}
					?>
				</table>	
		</div><!-- content end -->
	</div><!-- wrapper end -->	
	<!-- footer wraper -->
	<div class="footer">
		<center>All images, videos, content Copyright © 2013 Dare to be Digital Limited except where noted. All Rights Reserved. <a href="mailto:enquiries@daretobedigital.com">enquiries@daretobedigital.com</a> <br />
		Website Design by MTC Media | Dare 2011 illustrations by Sooper Double D</center>
	</div><!-- footer end -->
</body>
</html>