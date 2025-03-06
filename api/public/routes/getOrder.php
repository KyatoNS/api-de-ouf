<?php

require_once __DIR__ . "/../db.php";
require_once __DIR__ . "/../Utils.php";

try {
    $path = $_SERVER["REQUEST_URI"];
    $pathslited = explode("/", $path);
    $parameter = end($pathslited);

    $databaseConnection = getDatabaseConnection();
    $getOrderQuery = $databaseConnection->prepare("SELECT * FROM orders WHERE id_order=:id;");

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
} catch (Exception $exception) {
    echo jsonResponse(500, [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}