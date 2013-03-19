<html>
<body>
<head><title>Find team</title></head>

<form action="matchsearch.php" method="get">

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

<select id="roles" name="roles" action="testvar.php">
<option></option>
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
<input type="submit">
</form>
</body>
</html>