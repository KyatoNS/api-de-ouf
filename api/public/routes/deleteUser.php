<?php

require_once __DIR__ . "/../db.php";
require_once __DIR__ . "/../Utils.php";

try {
    $path = $_SERVER["REQUEST_URI"];
    $pathslited = explode("/", $path);
    $parameter = end($pathslited);

    $databaseConnection = getDatabaseConnection();

    try {
        $getUserQuery = $databaseConnection->prepare("SELECT * FROM users WHERE id_user=:id AND is_archived = FALSE;");
        $getUserQuery->execute([
            "id" => $parameter
        ]);
        $user = $getUserQuery->fetch(PDO::FETCH_ASSOC);

        if (empty($user)) {
            echo jsonResponse(404, [
                "success" => false,
                "message" => "User not found"
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

    $deleteUserQuery = $databaseConnection->prepare("UPDATE users SET is_archived = TRUE WHERE id_user = :id;");

    $deleteUserQuery->execute([
        "id" => $parameter
    ]);

    echo jsonResponse(200, [
        "success" => true,
        "message" => "deleted"
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
    die();
}
