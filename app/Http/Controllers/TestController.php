<?php


namespace App\Http\Controllers;


use App\Services\Test\TestService;
use Core\Base\Abstracts\BaseController;
use Core\Http\Responses\JsonResponse;

class TestController extends BaseController
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
        return JsonResponse::make([$_POST]);
    } // index.
} // TestController.