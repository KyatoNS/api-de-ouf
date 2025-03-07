<?php

require_once __DIR__ . "/../db.php";
require_once __DIR__ . "/../Utils.php";

try {
    $body = getBody();

    if(empty($body["prix"]) || empty($body["date"]) || empty($body["id_user"])) {
        echo jsonResponse(400, [
            "success" => false,
            "message" => "Missing parameters"
        ]);
        die();
    }

    $path = $_SERVER["REQUEST_URI"];
    $pathslited = explode("/", $path);
    $parameter = end($pathslited);

    $databaseConnection = getDatabaseConnection();

    try {
        $getOrderQuery = $databaseConnection->prepare("SELECT * FROM orders WHERE id_order=:id;");
        $getOrderQuery->execute([
            "id" => $parameter
        ]);
        $order = $getOrderQuery->fetch(PDO::FETCH_ASSOC);

        if (empty($order)) {
            echo jsonResponse(404, [
                "success" => false,
                "message" => "Order not found"
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

    $updateOrderQuery = $databaseConnection->prepare("UPDATE orders SET prix = :prix, date = :date, id_user=:id_user WHERE id_order = :id");

    $updateOrderQuery->execute([
        "prix" => htmlspecialchars($body["prix"]),
        "date" => htmlspecialchars($body["date"]),
        "id_user" => htmlspecialchars($body["id_user"]),
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