<?php


namespace Core\Http\Responses;


use Core\Base\Abstracts\CoreResponse;
use Core\Collections\HeadersCollection;

class JsonResponse extends CoreResponse
{
    // Приватный конструктор.
    private function __construct()
    {
    } // __construct.

    // Статические методы класса.
    public static function make($obj, array $headers = null, int $statusCode = 200): JsonResponse {
        $instance = new self();
        $instance->content = json_encode($obj);
        $instance->headers = new HeadersCollection();
        $instance->addDefaultHeaders();
        $instance->setStatusCode($statusCode);

        return $instance;
    } // make.

    private function addDefaultHeaders(): void{
        $this
            ->addHeader('Accept', 'application/json')
            ->addHeader('Content-Type', 'application/json', 'charset=utf-8');
    } // addDefaultHeaders.

} // JsonResponse.