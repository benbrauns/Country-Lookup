<?php

//a standard class for handling exceptions. If I were to expand this project this is where I would handle logging in a more complex way
class ExceptionHandler
{
    public static function handleException(Throwable $exception): void
    {
        http_response_code(500);

        echo json_encode([
            "code" => $exception->getCode(),
            "message" => $exception->getMessage(),
            "file"=> $exception->getFile(),
            "line"=> $exception->getLine(),
        ]);
    }

    public static function handleError(
        int $errno,
        string $errstr,
        string $errfile,
        int $errline
    ): bool
    {
        throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
    }
}