<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
    <title>Dare Matchmaking</title>
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
        <section id="welcomeHead" class="article">
			<h1>Dare Teams</h1>
			<form action="darematchmaking.php" method="get">			

			<select id="roles" name="roles" action="darematchmaking.php">
			<option value="empty"></option>
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
<select id="country" name="country">
<option>All</option>
<?php
           // Dette er en variabel som holder alle tilkoblingsdataene
 
            $connection = mysqli_connect("localhost", "daredig", "D4repass", "daredigital");
 
            //Dette er resultatsettet av en spesiell query

            $result = mysqli_query($connection, "select * from countries") or die (mysqli_error($connection));

            //While-funksjon for Ã¥ skrive ut resultatet av queriet

            while($row = mysqli_fetch_array($result)) {

            // $row er rader fra sÃ¸ket

            echo "<option> $row[Country] </option>";


            }
   ?>
			</select>

<input type="submit">
</form>
	
<?php 
$connection = mysqli_connect("localhost", "daredig", "D4repass", "daredigital");

if(mysqli_connect_errno()) {
	echo "Failed to connect " . mysqli_connect_error();
}

$searchRoles = $_GET['roles'];
$searchCountry = $_GET['country'];


if($searchCountry == "All") {
	$searchCountry = "";	
	}

if($searchRole == "empty") {
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

while($row = mysqli_fetch_array($results)) {
	echo $row['Team_Name'] . ", " . " " . $row['Name'] . " " . $row['Role'] . " " . "<br />"; 
}

?>			
		
		</div><!-- primairy content end-->
	
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