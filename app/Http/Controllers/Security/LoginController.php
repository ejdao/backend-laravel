<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Src\Application\Services\Security\AuthService;
use App\Http\Requests\Security\LoginRequest;

class LoginController extends Controller
{

    private $_authService;

    public function __construct()
    {
        $this->_authService = new AuthService();
    }
    /**
     * @OA\Post (
     *     path="/v1/login",
     *     tags={"auth"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="password",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "email":"admin",
     *                     "password":"123"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="invalid credentials / inactive user",
     *      )
     *  )
     */
    public function login(LoginRequest $request)
    {
        return $this->_authService->login($request);
    }
    /**
     * @OA\Get(
     *     path="/v1/refresh",
     *     tags={"auth"},
     *     security={ {"bearer": {} }},
     * @OA\Response(
     *     response=200,
     *     description="success"
     *   ),
     * @OA\Response(
     *     response="default",
     *     description="error"
     *   )
     * )
     */
    public function refresh()
    {
        return $this->_authService->refresh();
    }
    /**
     * @OA\Get(
     *     path="/v1/logout",
     *     tags={"auth"},
     *     security={ {"bearer": {} }},
     * @OA\Response(
     *     response=200,
     *     description="success"
     *   ),
     * @OA\Response(
     *     response="default",
     *     description="error"
     *   )
     * )
     */
    public function logout()
    {
        return $this->_authService->logout();
    }
}
