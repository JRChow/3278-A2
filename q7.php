<?php

$host = "sophia";
$username="jrzhou";
$password="1293Zjr";
$database="jrzhou";

// Step 1. Connect to database server
mysql_connect($host,$username,$password);

// Step 2. Select the database we work on
mysql_select_db($database) or die( "Unable to select database");

// Step 3. Prepare the database query
$query = "SELECT M.matchID, M.date, S.name, P.numberOfGoals
FROM Play P, Matches M, Stadiums S
WHERE P.playerID = ".$_GET['playerID']." AND P.teamID = ".$_GET['teamID']." AND P.matchID = M.matchID AND M.stadiumID = S.stadiumID;";

// Step 4. Execute the query
$result = mysql_query($query) or die( "Unable to execute query:".mysql_error());

echo "<!DOCTYPE html><html>";
echo "<head>";
echo "<title>Homework answers</title>";
echo "</head>";
echo "<body align=center>";

// Question content
echo "<p align='center'><b>Q6: </b>Result.</p><br><br>";
echo "<p align='center'>The answer of Q6</p>";

echo "<table border=1 width=600 align='center'>";
echo "<tr>";
echo "<th>Match ID</th>";
echo "<th>Date</th>";
echo "<th>Stadium Name</th>";
echo "<th>Goals</th>";
echo "</tr>";

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
	echo "<tr>";
	echo "<td>".$row['matchID']."</td>";
	echo "<td>".$row['date']."</td>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['numberOfGoals']."</td>";
	echo "</tr>";
}

echo "</table>";

echo "</body>";
echo "</html>";

// Last step. Close the MySQL database connection
mysql_close();
?>
