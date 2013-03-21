<?php
   // Henter ut MySQL tilkoblings detaljer i form av en variabel ved navn: $connection
	include ('PHP/Database/DBConnection.php');

	//Dette er resultatsettet av en spesiell query
	$result = mysqli_query($connection, "select Role from roles") or die (mysqli_error($connection));
	
	//While-funksjon for å skrive ut resultatet av queriet
	while($row = mysqli_fetch_array($result)) {
	// $row er rader fra søket
		echo "<option> $row[Role] </option>";
	 }
?>