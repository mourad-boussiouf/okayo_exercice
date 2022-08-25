<?php

declare(strict_types=1);

spl_autoload_register(function ($class) {
    require __DIR__ . "/src/$class.php";
});

set_error_handler("ErrorHandler::handleError");
set_exception_handler("ErrorHandler::handleException");

header("Content-type: application/json; charset=UTF-8");

$pageask = explode("/", $_SERVER["REQUEST_URI"]);
array_splice($pageask, 1, 1);


if ($pageask[1] != "factures") {
    http_response_code(404);
    exit;
}

$id = $parts[2] ?? null;

$database = new Database("localhost", "rest_api_demo", "root", " ");

$gateway = new FactureGateway($database);

$controller = new FactureController($gateway);

$controller->processRequest($_SERVER["REQUEST_METHOD"], $id);





