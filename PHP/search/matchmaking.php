<?php 
	include ('PHP/Database/DBConnection.php');

	if(mysqli_connect_errno()) {
		echo "Failed to connect " . mysqli_connect_error();
	}
	
	$searchRoles = $_GET['roles'];
	$searchCountry = $_GET['country'];


	if($_GET['country'] == "All") {
		$searchCountry = "";	
		}

	if($_GET['roles'] == "empty") {
		$searchRole = "";	
		}


		
	$query = "select Team_Name, concat(m.FirstName, ' ', m.LastName) as Name, r.Role as Role
	from teams as t
	left join members as m on m.team_ID = t.Team_ID
	join roles as r on r.Role_ID = m.role_ID
	having Team_Name not in 
	(
	select Team_name
	from  teams as t
	left join members as m on m.team_ID = t.Team_ID
	join roles as r on r.Role_ID = m.role_ID
	where r.Role like '%$searchRoles%'
	group by Team_Name
	)
	and Team_Name in 
	(
	select Team_name
	from  teams as t
	left join members as m on m.team_ID = t.Team_ID
	join countries as c on c.Country_ID = t.Country_ID
	where c.Country like '%$searchCountry%'
	group by Team_Name
	)
	order by Team_Name, Role asc";

	$results = mysqli_query($connection, $query);

?>			