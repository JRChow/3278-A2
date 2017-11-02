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
$query = "SELECT teamID, name FROM Teams;";

// Step 4. Execute the query
$result = mysql_query($query) or die( "Unable to execute query:".mysql_error());

echo "<!DOCTYPE html><html>";
echo "<head>";
echo "<title>Homework answers</title>";
echo "</head>";
echo "<body align=center>";

// Question content
echo "<p align='center'><b>Q6: </b>Display a drop-down menu which c;ontains the teamID and team name of all the teams.</p><br><br>";
echo "<form action='q6.php' method='GET'>";
echo "Team ID & Team Name: ";
echo "<select name='teamID'>";

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
	echo "<option value=".$row['teamID'].">".$row['teamID'].": ".$row['name']."</option>";
}
echo "</select>";

echo "<input type='submit' value='submit'>";
echo "</form>";

echo "</body>";
echo "</html>";

// Last step. Close the MySQL database connection
mysql_close();
?>
