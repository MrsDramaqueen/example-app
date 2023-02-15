<?php

namespace App\Service\Auth;

use App\Entity\DTO\Auth\LoginUserDTO;
use App\Entity\DTO\Auth\RegisterUserDTO;
use App\Models\User;
use App\Service\Traits\Responses;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthService
{
    use Responses;
    public function registerNewUser(RegisterUserDTO $dto): JsonResponse
    {
        try {
            $userData = [
                'name' => $dto->getName(),
                'email' => $dto->getEmail(),
                'password' => $dto->getPassword(),
            ];
            $user = User::query()->create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => bcrypt($userData['password'])
            ]);
        } catch (\Exception $e) {
            return $this->responseError($e);
        }

        $token = $user->createToken('apiToken')->plainTextToken;
        $result = [
            'user' => $user,
            'token' => $token
        ];

        return $this->responseSuccess($result);
    }

    public function login(LoginUserDTO $dto): JsonResponse
    {
        $userData = [
            'email' => $dto->getEmail(),
            'password' => $dto->getPassword(),
        ];
        try {
            $user = User::query()->where('email', $userData['email'])->first();
            if (!$user || !Hash::check($userData['password'], $user->password)) {
                return response()->json([
                    'message' => 'Incorrect username or password',
                ], Response::HTTP_FORBIDDEN);
            }
        } catch (\Exception $e) {
            return $this->responseError($e);
        }

        $token = $user->createToken('apiToken')->plainTextToken;
        $result = [
            'user' => $user,
            'token' => $token
        ];

        return $this->responseSuccess($result);
    }

    public function logout(): array
    {
        auth('sanctum')->user()->tokens()->delete();
        return [
            'message' => 'User logged out'
        ];
    }
}