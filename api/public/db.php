 <?php
require_once __DIR__ . "/Utils.php";

function getDatabaseConnection(): PDO{
	$databaseType = "mysql";
	$databasehost = "mariadb";
	$username = "admin";
	$password = "admin";
	$dbname= "apideouf";

	return new PDO(
		"$databaseType:host=$databasehost;dbname=$dbname",
		$username,
		$password);
}


function migrationDatabase(){
	try {
		$databaseConnection = getDatabaseConnection();
		$databaseConnection->query("DROP TABLE IF EXISTS `users`, `orders`;");
		$databaseConnection->query("CREATE TABLE `users`(
			`id_user` INT NOT NULL AUTO_INCREMENT,
			`username` varchar(50) NOT NULL,
			`password` varchar(255) NOT NULL,
			`token` varchar(50),
			PRIMARY KEY (`id_user`)
			);");
		$databaseConnection->query("CREATE TABLE `orders`(
			`id_order` INT NOT NULL AUTO_INCREMENT,
			`prix` INT NOT NULL,
			`date` DATE NOT NULL,
			`id_user` INT NOT NULL,
			PRIMARY KEY (`id_order`),
			FOREIGN KEY (`id_user`) REFERENCES users(`id_user`)
			);");
		echo jsonResponse(201, [
			"success" => true,
			"message" => "Database created"
		]);
	} catch (Exception $exception) {
		echo jsonResponse(500, [
			"success" => false,
			"error" => $exception->getMessage()
		]);
	}
}
	

