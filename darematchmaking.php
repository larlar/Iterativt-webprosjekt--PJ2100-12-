<?php include("header.php") ?>
		<div class="content cf">
			<div class="primary-content">
				<h1>Dare Teams</h1>
				<form action="darematchmaking.php" method="get">			
					<select id="roles" name="roles" action="darematchmaking.php">
						<option value="empty">All Roles</option>
						<?php
							//Makes a dropdown list based on roles in the MySQL database
							include ('PHP/Dropdown/roles.php');
						?>
					</select>
					<select id="country" name="country">
						<option value="All">All Countries</option>
						<?php
							//Makes a dropdown list based on countires in the MySQL database
							include ('PHP/Dropdown/countries.php');
						?>
					</select>
					<button type="submit" class="submit">Search</button>
				</form>
				<table class="searchoutput">
					<tr>
						<th>Team</th>
						<th>Name</th>
						<th>Role</th>
					</tr>	
					<?php 
						//Prints the results from the matchmaking query based on the values in the dropdown lists
						include ('PHP/search/matchmaking.php');
						
						while($row = mysqli_fetch_array($results)) {
							echo "<tr><td>" . $row['Team_Name'] . "</td><td>" . $row['Name'] . "</td><td>" . $row['Role'] . "</td></tr>"; 
						}
					?>			
				</table>	
			</div><!-- primairy content end-->
		</div><!-- content end -->
	</div><!-- wrapper end -->
	<!-- footer wraper -->
	<div class="footer">
		<center>All images, videos, content Copyright © 2013 Dare to be Digital Limited except where noted. All Rights Reserved. <a href="mailto:enquiries@daretobedigital.com">enquiries@daretobedigital.com</a> <br />
		Website Design by MTC Media | Dare 2011 illustrations by Sooper Double D</center>
	</div><!-- footer end -->	
</body>
</html>
