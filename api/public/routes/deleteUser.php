<?php

require_once __DIR__ . "/../db.php";
require_once __DIR__ . "/../Utils.php";

try {
    $path = $_SERVER["REQUEST_URI"];
    $pathslited = explode("/", $path);
    $parameter = end($pathslited);

    $databaseConnection = getDatabaseConnection();

    try {
<<<<<<< HEAD
        $getOrderQuery = $databaseConnection->prepare("SELECT * FROM users WHERE id_user=:id;");
        $getOrderQuery->execute([
            "id" => $parameter
        ]);
        $order = $getOrderQuery->fetch(PDO::FETCH_ASSOC);

        if (empty($order)) {
            echo jsonResponse(404, [
                "success" => false,
                "message" => "Order not found"
=======
        $getUserQuery = $databaseConnection->prepare("SELECT * FROM users WHERE id_user=:id;");
        $getUserQuery->execute([
            "id" => $parameter
        ]);
        $user = $getUserQuery->fetch(PDO::FETCH_ASSOC);

        if (empty($user)) {
            echo jsonResponse(404, [
                "success" => false,
                "message" => "User not found"
>>>>>>> e5f8d8701c6c8eabc1c6ed7994a93a61432ecddb
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

<<<<<<< HEAD
<<<<<<< HEAD
    $deleteOrderQuery = $databaseConnection->prepare("DELETE FROM users WHERE id_user=:id;");

    $deleteOrderQuery->execute([
=======
    $deleteUserQuery = $databaseConnection->prepare("UPDATE users SET is_archived = TRUE WHERE id_user = :id;");

    $deleteUserQuery->execute([
>>>>>>> 23e6132662ed6ab991e14eade2796bdd3c8df8ee
=======
    $deleteUserQuery = $databaseConnection->prepare("UPDATE users SET is_archived = TRUE WHERE id_user = :id;");

    $deleteUserQuery->execute([
>>>>>>> e5f8d8701c6c8eabc1c6ed7994a93a61432ecddb
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
<<<<<<< HEAD
}
