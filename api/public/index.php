<?php

header("Content-Type: application/json");
include 'db.php';
include 'PathTools.php'
$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

//echo($uri)

if (isPath("users")) {
    // Route pour récupérer tous les utilisateurs
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/users.php";
        die();
    }
}

?>
