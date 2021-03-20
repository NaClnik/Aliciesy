<?php


namespace Core\Bootstrap;


use App\Exceptions\ExceptionsHandler;
use App\Routes\ApiRouteDefiner;
use Core\Collections\HeadersCollection;
use Core\Defaults\DefaultUriMatchValidator;
use Core\Exceptions\RouteNotFoundException;
use Core\Routing\RouterBuilder;
use Exception;

class WebApplication
{
    // TODO: Декомпозировать метод.
    // Методы класса.
    public function run(): void{
        $routerBuilder = new RouterBuilder();

        $router = $routerBuilder
            ->setRoutesCollection(new ApiRouteDefiner())
            ->setUriMatchValidator(new DefaultUriMatchValidator())
            ->build();

        try {
            // Получаем ответ из экшена контроллера.
            $response = $router->executeRoute();

            // Удаляем все заголовки.
            header_remove();

            // Устанавливаем заголовки.
            $this->setHeaders($response->getHeaders());

            // Устанавливаем статус код.
            http_response_code($response->getStatusCode());

            // Отдаём клиенту контент из ответа.
            echo $response->getContent();
        } catch (Exception $exception) {
            $exceptionHandler = new ExceptionsHandler();

            $exceptionHandler->handle(get_class($exception), $exception);
        } // catch.
    } // run.

    private function setHeaders(HeadersCollection $headersCollection): void{
        $collection = $headersCollection->getCollection();

        foreach ($collection as $header){
            header($header);
        } // foreach.
    } // setHeaders.
} // WebApplication.