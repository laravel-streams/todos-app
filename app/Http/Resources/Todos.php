<?php

namespace App\Http\Resources;

use Streams\Api\ApiResource;
use Streams\Api\ApiResponse;

class Todos extends ApiResource
{
    protected static ?string $slug = null;

    protected static string | array $middleware = [];

    protected static string | array $withoutMiddleware = [];

    public function __invoke()
    {
        $response = new ApiResponse('todos');

        // Your endpoint logic...

        return $response->make();
    }
}
