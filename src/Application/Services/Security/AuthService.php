<?php

namespace Src\Application\Services\Security;

use App\Http\Requests\Security\LoginRequest;
use Src\Infrastructure\Models\Security\User;
use Src\Application\Services\Service;

class AuthService extends Service
{

    public function login(LoginRequest $request)
    {
        // Check if the email exists.
        if (User::where('email', $request->email)->count() === 0) {
            return $this->responseFail('Invalid credentials');
        }
        // Check if the user is active.
        if (!User::where('email', $request->email)->first()['active']) {
            return $this->responseFail('Your user is disabled');
        }
        // Generate authentication token if credentials are valid.
        $credentials = $request->only('email', 'password');
        if (!$token = auth($this->guard)->attempt($credentials)) {
            return $this->responseFail('Invalid credentials');
        }
        return $this->responseOk($token);
    }

    public function refresh()
    {
        $token = auth($this->guard)->refresh();
        return $this->responseOk($token);
    }

    public function logout()
    {
        auth($this->guard)->logout();
        return $this->responseNoContent();
    }
}
