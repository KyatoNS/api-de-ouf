<?php

header("Content-Type: application/json");

require_once __DIR__ . "/db.php";
require_once __DIR__ . "/Utils.php";

if (isPath("authenticate")) {
    if (isPostMethod()) {
         require_once __DIR__ . "/routes/authenticate.php";
         die();
    }
 }

if (isPath(route: "users")) {
    if (isGetMethod()) {
         require_once __DIR__ . "/routes/allUsers.php";
         die();
    }
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/createUser.php";
        die();
    }
}

if (isPath("users/:id")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/getUser.php";
        die();
    }
    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/deleteUser.php";
        die();
    }
    if (isPutMethod()) {
        require_once __DIR__ . "/routes/updateUser.php";
        die();
    }
}

if (isPath(route: "orders")) {
    if (isGetMethod()) {
         require_once __DIR__ . "/routes/allOrders.php";
         die();
    }
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/createOrder.php";
        die();
    }
}

if (isPath("orders/:id")) {
	if (isGetMethod()) {
	    require_once __DIR__ . "/routes/getOrder.php";
	    die();
	}
    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/deleteOrder.php";
        die();
    }
    if (isPutMethod()) {
        require_once __DIR__ . "/routes/updateOrder.php";
        die();
    }
}

if (isPath("migrate")) {
	if (isGetMethod()) {
        migrationDatabase();
	    die();
	}
}
?>
