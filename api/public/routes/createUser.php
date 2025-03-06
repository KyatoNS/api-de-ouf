<?php

require_once __DIR__ . "/../db.php";
require_once __DIR__ . "/../Utils.php";

try {
    $body = getBody();

    // Si il manque des champs
    if(empty($body["username"] || empty($body["password"]))) {
        echo jsonResponse(400, [
            "success" => false,
            "message" => "Missing parameters"
        ]);
        die();
    }

    $userUsername = $body["username"];
    $userPassword = password_hash($body["password"], PASSWORD_BCRYPT);

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
        INSERT INTO users(
            username,
            password
        ) VALUES (
            :username,
            :password
        );
    ");

    $createUserQuery->execute([
        "username" => htmlspecialchars($userUsername),
        "password" => htmlspecialchars($userPassword),
    ]);

    echo jsonResponse(200, [
        "success" => true,
        "message" => "created"
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}