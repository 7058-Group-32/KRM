<?php

$view = new stdClass();
$view->pageTitle = 'Homepage';

$host='poseidon.salford.ac.uk';
$dbName='aee647_1';
$user='aee647';
$pass='2zVpckKn#wn~';

$dbHandle = new PDO("mysql:host=$host;dbname=$dbName",  $user, $pass);

$sqlQuery = 'SELECT * FROM Users';
echo $sqlQuery;

$statement = $dbHandle->prepare($sqlQuery);
$statement->execute();

echo "<table border='1'>";
while ($row=$statement->fetch())
{
    echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td></tr>";
}
echo "</table>";

require_once('Views/index.phtml');
?>
