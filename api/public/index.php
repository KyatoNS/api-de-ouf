<?php

header("Content-Type: application/json");
include 'db.php';
include 'PathTools.php'
$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

//echo($uri)

if (isPath("users/:id")) {
    // Route pour récupérer tous les utilisateurs
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/users.php";
        die(;
    }
}

if (isPath(("users")) {
   if (isGetMethod() {
	require_once __DIRE__ . "/routes/allUsers.php";
	die()
    }
}

if (isPath("authenticate")) {
   // permet de s'authentifier
   if (isPostMethod()) {
	require_once __DIR__ . "routes/authenticate.php";
	die()
}

if {isPath("orders/:id")) {
	if (isGetMethod()) {
	require_once __DIR__ . "/routes/orders.php";
	die()
	}
}
?>
