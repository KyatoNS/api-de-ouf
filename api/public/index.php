<?php

header("Content-Type: application/json");

require_once __DIR__ . "/db.php";
require_once __DIR__ . "/Utils.php";

if (isPath("authenticate")) {
    if (isGetMethod()) {
         require_once __DIR__ . "/routes/authenticate.php";
         die();
    }
 }

if (isPath(route: "users")) {
    if (isGetMethod()) {
         require_once __DIR__ . "/routes/allUsers.php";
         die();
     }
 }

if (isPath("users/:id")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/users.php";
        die();
    }
}

if (isPath("orders/:id")) {
	if (isGetMethod()) {
	    require_once __DIR__ . "/routes/orders.php";
	    die();
	}
}

if (isPath("migration")) {
	if (isGetMethod()) {
        migrationDatabase();
	    die();
	}
}
?>
