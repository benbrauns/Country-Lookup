<?php

//settings for the api

//this is an autoload function for classes so that I don't have to import each file seperately
spl_autoload_register(function ($class) {
    require __DIR__ . "/src/$class.php";
});

set_error_handler("ExceptionHandler::handleError");
set_exception_handler("ExceptionHandler::handleException");

header("Content-Type: application/json; charset=UTF-8");


//handling the request
$parts  = explode("/", $_SERVER["REQUEST_URI"]);

if ($parts[1] != "country") 
{
    http_response_code(404);
    exit;
}

$id = $parts[2] ?? null;

$controller = new CountryController;

$controller->processRequest($id);