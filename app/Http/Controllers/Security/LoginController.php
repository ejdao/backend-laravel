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

    public function login(LoginRequest $request)
    {
        return $this->_authService->login($request);
    }

    public function refresh()
    {
        return $this->_authService->refresh();
    }

    public function logout()
    {
        return $this->_authService->logout();
    }
}
