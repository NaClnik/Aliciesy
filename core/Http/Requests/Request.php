<?php


namespace Core\Http\Requests;


class Request
{
    // Приватный конструктор.
    private function __construct()
    {
    } // __construct.

    // Статический метод для создания экземпляра объекта.
    public static function make(): Request {
        return new self();
    } // make.

    public function getQueryParameters(): array
    {
        return $_GET;
    } // getQueryParameters.

    public function getData(){
        return $_POST;
    } // getData.
} // Request.