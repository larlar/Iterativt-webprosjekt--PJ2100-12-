﻿<?php include("header-nor.php") ?>
		<div class="content cf">
			<div class="primary-content">
				<h1>Dare Matchmaking</h1>
				<form action="darematchmaking-nor.php" method="get">			
					<p>Jeg er en: 
						<select id="roles" name="roles" action="darematchmaking-nor.php">
							<option value="empty">Rolle</option>
							<?php
								//Makes a dropdown list based on roles in the MySQL database
								include ('PHP/Dropdown/roles.php');
							?>
						</select>
						som ser etter et lag fra:
							<select id="country" name="country">
								<option value="All">Alle land</option>
								<?php
									//Makes a dropdown list based on countires in the MySQL database
									include ('PHP/Dropdown/countries.php');
								?>
							</select>
							<button type="submit" class="submit">Søk</button></p>
				</form>
				<table class="searchoutput">
					<tr>
						<th>Lag</th>
						<th>Navn</th>
						<th>Rolle</th>
						<th>Email</th>
						<th>Land</th>
					</tr>	
					<?php 
						//Prints the results from the matchmaking query based on the values in the dropdown lists
						include ('PHP/search/matchmaking.php');
						
						while($row = mysqli_fetch_array($results)) {
							echo "<tr><td>" . $row['Team_Name'] . "</td><td>" . $row['Name'] . "</td><td>" . $row['Role'] . "</td><td>" . $row['Email'] . "</td><td>" . $row[Country] .  "</td></tr>"; 
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
