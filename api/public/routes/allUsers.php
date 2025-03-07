<?php

require_once __DIR__ . "/../db.php";
require_once __DIR__ . "/../Utils.php";
require_once __DIR__ . "/../tokens.php";

try {
    $headers = getallheaders();
    $head = ($headers['Authorization']);
    $token = explode(" ", $head);
    $token = $token[1];
    if(verifyToken($token)){
        $databaseConnection = getDatabaseConnection();
        $getUsersQuery = $databaseConnection->query("SELECT * FROM users WHERE is_archived = FALSE;");

        $users = $getUsersQuery->fetchAll(PDO::FETCH_ASSOC);
        echo jsonResponse(200, [
            "success" => true,
            "users" => $users
        ]);
    }else{
        echo jsonResponse(401, [
            "success" => false,
            "message" => "Token not valid"
        ]);
    }

} catch (Exception $exception) {
    echo jsonResponse(500, [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}