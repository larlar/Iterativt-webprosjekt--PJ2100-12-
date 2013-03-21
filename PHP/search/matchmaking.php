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


		
	$query = "select Team_Name, concat(m.firstname, ' ', m.lastname) as Name, r.role as Role
	from teams as t
	left join members as m on m.team_ID = t.team_ID
	join roles as r on r.role_id = m.role_ID
	having team_name not in 
	(
	select Team_name
	from  teams as t
	left join members as m on m.team_ID = t.team_ID
	join roles as r on r.role_ID = m.role_ID
	where r.role like '%$searchRoles%'
	group by team_name
	)
	and team_name in 
	(
	select Team_name
	from  teams as t
	left join members as m on m.team_ID = t.team_ID
	join countries as c on c.country_ID = t.country_ID
	where c.country like '%$searchCountry%'
	group by team_name
	)
	order by Team_Name, role asc";

	$results = mysqli_query($connection, $query);

?>			