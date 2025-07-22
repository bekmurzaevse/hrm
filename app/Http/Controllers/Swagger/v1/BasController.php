<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;

use OpenApi\Attributes as OA;

#[
    OA\Info(version: "1.0.0", description: "Human Resource Management App Project Documentation", title: "Human Resource Management App Documentation"),
    OA\PathItem(path: "/v1"),
    OA\Server(url: 'http://localhost:8000/api', description: "local server"),
    OA\SecurityScheme(securityScheme: 'sanctum', type: "apiKey", name: "Authorization", in: "header", description: "Token kiritiwde 'Bearer {token}' formatinan paydalanin'"),
]
class BasController extends Controller
{
    //
}
