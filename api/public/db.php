 <?php

$databaseType = "mysql"

$servername = "localhost";

$username = "admin";

$password = "admin";

$dbname= "apideouf";


function getDatabaseConnection(): PDO

	return new PDO(
		"$databaseType:host=$servername;dbname=$dbname",
		$username,
		$password);
