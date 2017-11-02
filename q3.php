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
$query = "SELECT stadiumID, location, name
FROM Stadiums WHERE name LIKE '%National%';";

// Step 4. Execute the query
$result = mysql_query($query) or die( "Unable to execute query:".mysql_error());



// Step 5. Display the results
echo "<!DOCTYPE html><html>";
echo "<head>";
echo "<title>Homework answers</title>";
echo "</head>";
echo "<body  align=center>";

// Question content
echo "<p align='center'><b>Q3: </b>Display the stadiumID, location and name of all the stadium(s), whose names contain the substring \"National\"</p><br><br>";
echo "<p align='center'>The answer of Q3</p>";

echo "<table border=1 width=600 align='center'>";
echo "<tr>";
echo "<th>Stadium ID</th>";
echo "<th>Location</th>";
echo "<th>Name</th>";
echo "</tr>";

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
	echo "<tr>";
	echo "<td>".$row['stadiumID']."</td>";
	echo "<td>".$row['location']."</td>";
	echo "<td>".$row['name']."</td>";
	echo "</tr>";
}


echo "</table>";
echo "</body>";
echo "</html>";


// Last step. Close the MySQL database connection
mysql_close();
?>
