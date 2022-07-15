<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(title="Backend Laravel", version="1.0")
 *
 * @OA\Server(url="http://127.0.0.1:8000/api")
 * 
 * @OA\SecurityScheme(
 *     type="http",
 *     description="Login with email and password to get the authentication token",
 *     name="Token based Based",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="bearer",
 * )
 */
class Controller extends BaseController
{

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;
}
// Documentation's examples here:
// https://github.com/caohoangtu/swagger-lesson-1/blob/master/app/Http/Controllers/TodoController.php
// Ejecute this command when you add new documentation or change the actual:
// php artisan l5-swagger:generate