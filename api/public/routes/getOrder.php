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
        $path = $_SERVER["REQUEST_URI"];
        $pathslited = explode("/", $path);
        $parameter = end($pathslited);

        $databaseConnection = getDatabaseConnection();
        $getOrderQuery = $databaseConnection->prepare("SELECT * FROM orders WHERE id_order=:id AND is_archived = FALSE;");

        $getOrderQuery->execute([
            "id" => htmlspecialchars($parameter),
        ]);

        $order = $getOrderQuery->fetchAll(PDO::FETCH_ASSOC);

        if (empty($order)) {
            echo jsonResponse(404, [
                "success" => false,
                "error" => "Order not found!"
            ]);
            die();
        }

        echo jsonResponse(200, [
            "success" => true,
            "orders" => $order
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