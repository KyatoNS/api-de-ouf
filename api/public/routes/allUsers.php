<?php

require_once __DIR__ . "/../db.php";
require_once __DIR__ . "/../Utils.php";

try {

    $databaseConnection = getDatabaseConnection();
    $getUsersQuery = $databaseConnection->query("SELECT * FROM users;");

    $users = $getUsersQuery->fetchAll(PDO::FETCH_ASSOC);

    echo jsonResponse(200, [
        "success" => true,
        "users" => $users
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}