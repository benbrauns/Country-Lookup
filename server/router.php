<?php

//settings for the api

//this is an autoload function for classes so that I don't have to import each file seperately
spl_autoload_register(function ($class) {
    require __DIR__ . "/src/$class.php";
});

set_error_handler("ExceptionHandler::handleError");
set_exception_handler("ExceptionHandler::handleException");

header("Content-Type: application/json; charset=UTF-8");
//I would never actually deploy anything with cross origin open like this, I just did it to make it easier when calling from vue temporarily
header("Access-Control-Allow-Origin: *");


//handling the request
$parts  = explode("/", $_SERVER["REQUEST_URI"]);

if (!in_array($parts[1],array('name', 'alpha', 'currency')))
{
    http_response_code(404);
    exit;
}

$id = $parts[2] ?? null;

$controller = new CountryController;

$controller->processRequest($parts[1], $parts[2]);
