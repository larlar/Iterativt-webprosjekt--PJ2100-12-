<?php 
$connection = mysqli_connect("localhost", "daredig", "D4repass", "daredigital");

if(mysqli_connect_errno()) {
	echo "Failed to connect " . mysqli_connect_error();
}

$searchCountry = $_GET[country];
$searchRoles = $_GET[roles];
$searchResult = trim($_GET[firstname]);

if($_GET[country] == "All" ) {
	$searchCountry = "";	
	}
	
if($_GET[roles] == "All") {
	$searchRoles = "";	
	}	 
	

$query = "select Lastname, Firstname, Email, c.Country, r.Role, t.team_name as Team
from members as m
join countries as c on c.Country_ID = m.country_ID
join roles as r on r.role_id = m.role_id
left join teams as t on t.team_ID = m.team_ID
where country like '%$searchCountry%' 
and r.role like '%$searchRoles%'
and 
(
FirstName like '%$searchResult%'
or lastName like '%$searchResult%'
or email like '%$searchResult%'
)";

$results = mysqli_query($connection, $query);

while($row = mysqli_fetch_array($results)) {
	echo $row['Lastname'] . ", " . " " . $row['Firstname'] . " " . $row['Role'] . " " . "<br />"; 
}

?>
