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
$query = "
SELECT Players.name, Players.playerID, Players.teamID, SUM(Play.numberOfGoals) AS totalGoal
FROM Players, Play
WHERE Players.playerID = Play.playerID AND Players.teamID = Play.teamID
GROUP BY Players.playerID, Players.teamID
HAVING totalGoal IN
(SELECT MAX(totalGoal) FROM (
    SELECT SUM(numberOfGoals) AS totalGoal
	FROM Play
	GROUP BY playerID, teamID
) TG)
";

// Step 4. Execute the query
$result = mysql_query($query) or die( "Unable to execute query:".mysql_error());


// Step 5. Display the results
echo "<!DOCTYPE html><html>";
echo "<head>";
echo "<title>Homework answers</title>";
echo "</head>";
echo "<body  align=center>";

// Question content
echo "<p align='center'><b>Q4: </b>Display the playerID, player name, teamID and total number of goals scored, for the player(s) who played in at least 2 matches.</p><br><br>";
echo "<p align='center'>The answer of Q4</p>";

echo "<table border=1 width=600 align='center'>";
echo "<tr>";
echo "<th>Player Name</th>";
echo "<th>Player ID</th>";
echo "<th>Team ID</th>";
echo "<th>Accumulated Goals</th>";
echo "</tr>";

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
	echo "<tr>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['playerID']."</td>";
	echo "<td>".$row['teamID']."</td>";
	echo "<td>".$row['totalGoal']."</td>";
	echo "</tr>";
}


echo "</table>";
echo "</body>";
echo "</html>";


// Last step. Close the MySQL database connection
mysql_close();
?>
