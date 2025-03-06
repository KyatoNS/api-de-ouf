<?php

require_once __DIR__ . "/../db.php";
require_once __DIR__ . "/../Utils.php";

try {
    $body = getBody();

    // Si il manque des champs
    if(empty($body["id"])) {
        echo jsonResponse(400, [
            "success" => false,
            "message" => "Missing parameters"
        ]);
        die();
    }

    $databaseConnection = getDatabaseConnection();
    $getUsersQuery = $databaseConnection->prepare("SELECT * FROM users WHERE :id;");

    $getUsersQuery->execute([
        "id" => htmlspecialchars($body["id"]),
    ]);

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