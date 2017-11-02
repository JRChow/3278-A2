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
$query = "SELECT playerID, name FROM Players WHERE playerID='1';";

// Step 4. Execute the query
$result = mysql_query($query) or die( "Unable to execute query:".mysql_error());



// Step 5. Display the results
echo "<!DOCTYPE html><html>";
echo "<head>";
echo "<title>Homework answers</title>";
echo "</head>";
echo "<body  align=center>";

echo "<p align='center'><b>Q1: </b>Display the playerID(s) and the name(s) of all players whose playerID are 1.</p><br><br>";
echo "<p align='center'>The answer of Q1</p>";

echo "<table border=1 width=600 align='center'>";
echo "<tr>";
echo "<th>Player ID</th>";
echo "<th>Name</th>";
echo "</tr>";

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
    echo "<tr>";
    echo "<td>".$row['playerID']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "</tr>";
}


echo "</table>";
echo "</body>";
echo "</html>";


// Last step. Close the MySQL database connection
mysql_close();
?>
