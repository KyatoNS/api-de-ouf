<?php

require_once __DIR__ . "/../db.php";
require_once __DIR__ . "/../Utils.php";

try {
    $path = $_SERVER["REQUEST_URI"];
    $pathslited = explode("/", $path);
    $parameter = end($pathslited);

    $databaseConnection = getDatabaseConnection();
    $getUserQuery = $databaseConnection->prepare("SELECT * FROM users WHERE id_user=:id AND is_archived = FALSE;");

    $getUserQuery->execute([
        "id" => htmlspecialchars($parameter),
    ]);

    $user = $getUserQuery->fetchAll(PDO::FETCH_ASSOC);

    if (empty($user)) {
        echo jsonResponse(404, [
            "success" => false,
            "error" => "User not found!"
        ]);
        die();
    }

    echo jsonResponse(200, [
        "success" => true,
        "users" => $user
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}
