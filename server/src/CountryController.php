<?php

class CountryController 
{
    public function processRequest(?string $name): void
    {
        $result = file_get_contents("https://restcountries.com/v3.1/name/" . $name);
        echo $result;
    }
}