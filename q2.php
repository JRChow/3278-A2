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
$query = "SELECT M.matchID, M.date, S.name FROM Matches M, Stadiums S 
WHERE date > '2017-9-30' AND M.stadiumID = S.stadiumID ORDER BY date DESC;";

// Step 4. Execute the query
$result = mysql_query($query) or die( "Unable to execute query:".mysql_error());



// Step 5. Display the results
echo "<!DOCTYPE html><html>";
echo "<head>";
echo "<title>Homework answers</title>";
echo "</head>";
echo "<body  align=center>";

// Question content
echo "<p align='center'><b>Q2: </b>Display the matchID, date and the stadium name of all match(es) that are held after 2017-9-30, sort the match(es) such that the later matches are listed ahead of the earlier matches.</p><br><br>";
echo "<p align='center'>The answer of Q2</p>";

echo "<table border=1 width=600 align='center'>";
echo "<tr>";
echo "<th>Match ID</th>";
echo "<th>Date</th>";
echo "<th>Stadium</th>";
echo "</tr>";

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
	echo "<tr>";
	echo "<td>".$row['matchID']."</td>";
	echo "<td>".$row['date']."</td>";
	echo "<td>".$row['name']."</td>";
	echo "</tr>";
}


echo "</table>";
echo "</body>";
echo "</html>";


// Last step. Close the MySQL database connection
mysql_close();
?>
