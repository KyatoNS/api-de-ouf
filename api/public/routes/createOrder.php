<?php

require_once __DIR__ . "/../db.php";
require_once __DIR__ . "/../Utils.php";

try {
    $body = getBody();

    // Si il manque des champs
    if(empty($body["prix"]) || empty($body["date"]) || empty($body["id_user"])) {
        echo jsonResponse(400, [
            "success" => false,
            "message" => "Missing parameters"
        ]);
        die();
    }

    $orderPrice = $body["prix"];
    $date = $body["date"];
    $idUser = $body["id_user"];

    $databaseConnection = getDatabaseConnection();

    $createOrderQuery = $databaseConnection->prepare("
        INSERT INTO orders(
            prix,
            date,
            id_user
        ) VALUES (
            :prix,
            :date,
            :id_user
        );
    ");

    $createOrderQuery->execute([
        "prix" => htmlspecialchars($orderPrice),
        "date" => htmlspecialchars($date),
        "id_user" => htmlspecialchars($idUser),
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