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
    <ul>
        <li class="navi-object Home"><a href="index.html">Home</a></li>
        <li class="navi-object About"><a href="about.html">About</a></li>
        <li class="navi-object Apply"><a href="apply.html">Apply</a></li>
		<li class="navi-object Dare Members"><a href="daremembers.html">Dare Members</a></li>
		<li class="navi-object Dare Matchmaking"><a href="darematchmaking.html">Dare Matchmaking</a></li>
		<li class="navi-object Contact"><a href="contact.html">Contact</a></li>
        <li class="search"><form >
            <input type="text" />
                <button class="submit">Go</button>
        </form></li>
    </ul>
</div>
	
	<div class="content cf">
		<div class="primary-content">
		<h1>Dare Members</h1>
		

		<form action="daremembers.php" method="get">
		Firstname: <input type="text" name="firstname" Placeholder="Search">
		<input type="submit">


			<select id="country" name="country">
			<option>All</option>
<?php
           // Dette er en variabel som holder alle tilkoblingsdataene
 
            $connection = mysqli_connect("localhost", "daredig", "D4repass", "daredigital");
 
            //Dette er resultatsettet av en spesiell query

            $result = mysqli_query($connection, "select * from countries") or die (mysqli_error($connection));

            //While-funksjon for å skrive ut resultatet av queriet

            while($row = mysqli_fetch_array($result)) {

            // $row er rader fra søket

            echo "<option> $row[Country] </option>";


            }
   ?>
</select>


<p2>Roles</p2>
<select id="roles" name="roles" action="daremembers.php">
<option>All</option>

<?php
            // Dette er en variabel som holder alle tilkoblingsdataene
 
            $connection = mysqli_connect("localhost", "daredig", "D4repass", "daredigital");
 
            //Dette er resultatsettet av en spesiell query

            $result = mysqli_query($connection, "select role from roles") or die (mysqli_error($connection));

            //While-funksjon for å skrive ut resultatet av queriet

            while($row = mysqli_fetch_array($result)) {

            // $row er rader fra søket

            echo "<option> $row[role] </option>";
         }
?>

</select>

<select id="hasteam" name="hasteam" action="daremembers.php">
Har du lag?
<option value="empty"></option>
<option value="yes">Ja</option>
<option value="no">Nei</option>
</select>

</form>




<?php 
$connection = mysqli_connect("localhost", "daredig", "D4repass", "daredigital");

if(mysqli_connect_errno()) {
	echo "Failed to connect " . mysqli_connect_error();
}

$hasTeam = $_GET['hasteam'];

$searchCountry = $_GET[country];
$searchRoles = $_GET[roles];
$searchResult = trim($_GET[firstname]);

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
	$teamSearch = "and .team_ID is null";
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
)";

$results = mysqli_query($connection, $query);

while($row = mysqli_fetch_array($results)) {
	echo $row['Lastname'] . ", " . " " . $row['Firstname'] . " " . $row['Role'] . " " . "<br />"; 
}

?>
	
		</div><!-- primary content end-->
	
	      <div class="sidebar">
				<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fdarenordic&amp;width=320&amp;height=558&amp;show_faces=true&amp;colorscheme=light&amp;stream=true&amp;border_color&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:320px; height:558px;" allowTransparency="true"></iframe>				<div class ="nith_add">
					<div class ="nith_add">
					<img src="img/nithbutton.jpg" alt="NITH add">
				</div>
				<div class="dareinternational_add">
					<img src="img/dareint.jpg" alt="Dare international add">
				</div>
				</div>
			</div><!-- sidebar end -->	
	</div><!-- content end -->
	</div><!-- wrapper end -->
	
	<!-- footer wraper -->
	<div class="footer">
		<center>All images, videos, content Copyright © 2013 Dare to be Digital Limited except where noted. All Rights Reserved. <a href="mailto:enquiries@daretobedigital.com">enquiries@daretobedigital.com</a> <br />
		Website Design by MTC Media | Dare 2011 illustrations by Sooper Double D</center>
	</div><!-- footer end -->
	
</body>

</html>