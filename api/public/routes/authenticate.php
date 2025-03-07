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
    $userPassword = $body["password"];

    try {
        $databaseConnection = getDatabaseConnection();

        $getUserQuery = $databaseConnection->prepare("SELECT * FROM users WHERE username=:username AND is_archived = FALSE;");
        $getUserQuery->execute([
            "username" => $userUsername,
        ]);
        $user = $getUserQuery->fetch(PDO::FETCH_ASSOC);

        if (empty($user)) {
            echo jsonResponse(404, [
                "success" => false,
                "message" => "Invalid username and password"
            ]);
            die();
        }

        $hashed_password = $user["password"];
        if (password_verify($userPassword, $hashed_password)){
            echo("tout est ok");
        }else{
            echo jsonResponse(404, [
                "success" => false,
                "message" => "Invalid username and password"
            ]);
            die();
        }

    } catch (Exception $exception) {
        echo jsonResponse(500, [
            "success" => false,
            "error" => $exception->getMessage()
        ]);
        die();
    }

} catch (Exception $exception) {
    echo jsonResponse(500, [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
    die();
}