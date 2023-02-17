<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Baker;
use App\Models\Client;
use App\Models\User;
use App\Service\Auth\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function register(AuthService $service, AuthRequest $request): JsonResponse
    {
        return $service->registerNewUser($request->getRegisterDTO());
    }

    public function login(AuthService $service, LoginRequest $request): JsonResponse
    {
        return $service->login($request->getLoginDTO());
    }

    public function logout(AuthService $service): array
    {
        return $service->logout();
    }
}
