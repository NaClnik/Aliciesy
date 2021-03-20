<?php


namespace App\Http\Controllers;


use App\Services\Test\TestService;
use Core\Base\Abstracts\BaseController;
use Core\Http\Responses\JsonResponse;

class TestController extends BaseController
{
    // Write actions here.
    public function index(): JsonResponse {
        return JsonResponse::make(['message' => 'example']);
    } // index.
} // TestController.