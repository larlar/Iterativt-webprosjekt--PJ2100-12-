<?php 
	include ('PHP/Database/DBConnection.php');

	if(mysqli_connect_errno()) {
		echo "Failed to connect " . mysqli_connect_error();
	}

	$hasTeam = $_GET[hasteam];
	$searchCountry = $_GET[country];
	$searchRoles = $_GET[roles];
	$searchResult = trim($_GET[textValue]);

	if($_GET[country] == "All" ) {
		$searchCountry = "";	
		}
		
	if($_GET[roles] == "All") {
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

		

	$query = "select Lastname, Firstname, Email, c.Country, r.Role, t.team_name as Team
	from members as m
	join countries as c on c.Country_ID = m.country_ID
	join roles as r on r.role_id = m.role_id
	left join teams as t on t.team_ID = m.team_ID
	where country like '%$searchCountry%' 
	and r.role like '%$searchRoles%'
	$teamSearch
	and 
	(
	FirstName like '%$searchResult%'
	or lastName like '%$searchResult%'
	or email like '%$searchResult%'
	or t.team_Name like '%$searchResult%'
	)";

	$results = mysqli_query($connection, $query);
		
?>