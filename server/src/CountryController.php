<?php

class CountryController
{
    public function processRequest(string $endpoint, string $searchValue): void
    {
        $result = file_get_contents("https://restcountries.com/v3.1/" . $endpoint . "/" . $searchValue);
        echo $result;
    }
}