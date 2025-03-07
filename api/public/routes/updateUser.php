<?php

require_once __DIR__ . "/../db.php";
require_once __DIR__ . "/../Utils.php";

try {
    $body = getBody();

    if(empty($body["username"]) || empty($body["password"])) {
        echo jsonResponse(400, [
            "success" => false,
            "message" => "Missing parameters"
        ]);
        die();
    }

    $userUsername = $body["username"];
    $userPassword = password_hash($body["password"], PASSWORD_BCRYPT);

    $path = $_SERVER["REQUEST_URI"];
    $pathslited = explode("/", $path);
    $parameter = end($pathslited);

    $databaseConnection = getDatabaseConnection();

    $updateUserQuery = $databaseConnection->prepare("UPDATE users SET password = :password, username = :username WHERE id_user = :id");

    $updateUserQuery->execute([
        "username" => htmlspecialchars($userUsername),
        "password" => htmlspecialchars($userPassword),
        "id" => htmlspecialchars($parameter),
    ]);

    echo jsonResponse(200, [
        "success" => true,
        "message" => "updated"
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}