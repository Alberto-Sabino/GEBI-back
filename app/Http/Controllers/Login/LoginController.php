<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;
use App\Services\AuthServices\LoginService;

class LoginController extends Controller
{
    public function __construct(
        protected LoginService $loginService
    ) {}

    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $loggedUser = $this->loginService
            ->login($request->all());

        return response()->json($loggedUser);
    }
}
