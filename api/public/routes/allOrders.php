<?php

require_once __DIR__ . "/../db.php";
require_once __DIR__ . "/../Utils.php";

try {

    $databaseConnection = getDatabaseConnection();
    $getOrdersQuery = $databaseConnection->query("SELECT * FROM orders;");

    $orders = $getOrdersQuery->fetchAll(PDO::FETCH_ASSOC);

    echo jsonResponse(200, [
        "success" => true,
        "orders" => $orders
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}