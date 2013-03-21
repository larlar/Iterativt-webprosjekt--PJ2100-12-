<?php 
		
	include ('PHP/Database/DBconnection.php');
	
	if(mysqli_connect_errno()) {
		echo "Failed to connect " . mysqli_connect_error();
	}

	$hasTeam = $_GET['hasteam'];
	$searchCountry = $_GET['country'];
	$searchRoles = $_GET['roles'];
	$searchResult = trim($_GET['textValue']);

	if($_GET['country'] == "All" ) {
		$searchCountry = "";	
		}
		
	if($_GET['roles'] == "All") {
		$searchRoles = "";	
		}	 


	if($hasTeam == "yes") {
		$teamSearch = "and t.team_ID is not null";
		}
	else if($hasTeam == "no") {
		$teamSearch = "and t.team_ID is null";
		}
	else if($hasTeam == "empty") {
		$teamSearch = "";	
		}

		

	$query = "select LastName as Lastname, FirstName as Firstname, Email, c.Country as Country, r.Role as Role, t.Team_Name as Team
	from members as m
	join countries as c on c.Country_ID = m.country_ID
	join roles as r on r.role_ID = m.Role_ID
	left join teams as t on t.Team_ID = m.team_ID
	where Country like '%$searchCountry%' 
	and Role like '%$searchRoles%'
	$teamSearch
	and 
	(
	Firstname like '%$searchResult%'
	or Lastname like '%$searchResult%'
	or Email like '%$searchResult%'
	or t.Team_Name like '%$searchResult%'
	or r.Role like '%$searchResult%'
	)";

	$results = mysqli_query($connection, $query);
		
?>