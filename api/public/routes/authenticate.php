<?php

require_once __DIR__ . "/../db.php";
require_once __DIR__ . "/../Utils.php";
require_once __DIR__ . "/../tokens.php";

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

        $userId = $user["id_user"];
        $hashed_password = $user["password"];
        if (password_verify($userPassword, $hashed_password)){
            $token = createToken($userId);
            $addToken = $databaseConnection->prepare("UPDATE users SET token=:token WHERE id_user=:id_user;");
            $addToken->execute([
                "token" => $token,
                "id_user" => $userId,
            ]);
            echo jsonResponse(200, [
                "success" => true,
                "token" => $token
            ]);
            die();
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