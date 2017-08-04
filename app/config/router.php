<?php

$router = $di->getRouter();

// Define your routes here
$router->add(
    "/",
    [
        "controller" => "Jobs",
        "action"     => "main",
    ]
);
$router->setDefaults(
    [
        "controller" => "Jobs",
        "action"     => "main",
    ]
);
$router->handle();
