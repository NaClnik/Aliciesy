<?php


namespace Core\Http\Responses;


class JsonResponse
{
    // Поля класса.
    private $content;
    private array $headers;

    // Приватный конструктор.
    private function __construct()
    {
    } // __construct.

    // Статические методы класса.
    public static function make($obj, ?array $headers){
        $instance = new self();
    } // make.
} // JsonResponse.