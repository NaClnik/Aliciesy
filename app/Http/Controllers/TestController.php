<?php


namespace App\Http\Controllers;


use App\Services\Test\TestService;
use Core\Http\Responses\JsonResponse;

class TestController
{
    // Сервисы.
    private TestService $testService;

    public function __construct(
        TestService $testService
    )
    {
        $this->testService = $testService;
    } // __construct.

    public function index(): JsonResponse {
        return JsonResponse::make('ok');
    } // index.
} // TestController.