<?php


namespace App\Http\Controllers;


use App\Services\Test\TestService;

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

    public function index(): string {
        return 'worked!';
    } // index.
} // TestController.