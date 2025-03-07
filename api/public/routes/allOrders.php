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
        $getOrdersQuery = $databaseConnection->query("SELECT * FROM orders WHERE is_archived = FALSE;");

        $orders = $getOrdersQuery->fetchAll(PDO::FETCH_ASSOC);

        echo jsonResponse(200, [
            "success" => true,
            "orders" => $orders
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