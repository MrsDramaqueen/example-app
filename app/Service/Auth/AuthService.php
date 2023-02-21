<?php

namespace App\Service\Auth;

use App\Entity\DTO\Auth\LoginUserDTO;
use App\Entity\DTO\Auth\RegisterUserDTO;
use App\Entity\DTO\Client\ClientStoreDTO;
use App\Http\Controllers\Client\ClientController;
use App\Models\Client;
use App\Models\User;
use App\Service\Baker\BakerService;
use App\Service\Client\ClientService;
use App\Service\Traits\Responses;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthService
{
    use Responses;

    /**
     * @param RegisterUserDTO $dto
     * @return JsonResponse
     */
    public function register(RegisterUserDTO $dto): JsonResponse
    {
        try {
            switch ($dto->getClassType()) {
                case 'clients':
                    $userClass = (new ClientService)->store($dto);
                    break;
                case 'bakers':
                    $userClass = (new BakerService)->store($dto);
                    break;
            }

            $user = User::query()->create([
                'name' => $dto->getName(),
                'email' => $dto->getEmail(),
                'password' => bcrypt($dto->getPassword()),
                'class_type' => $dto->getClassType(),
                'class_id' => $userClass->getId()
            ]);

        } catch (\Exception $e) {
            return $this->responseError($e);
        }

        $data = [
            'token' => $user->createToken('apiToken')->plainTextToken
        ];

        return $this->responseSuccess($data);
    }

    /**
     * @param LoginUserDTO $dto
     * @return JsonResponse
     */
    public function login(LoginUserDTO $dto): JsonResponse
    {
        $userData = [
            'email' => $dto->getEmail(),
            'password' => $dto->getPassword(),
        ];
        try {
            $user = User::query()->where('email', $userData['email'])->first();
            if (!$user || !Hash::check($userData['password'], $user->getPassword())) {
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

    /**
     * @return string[]
     */
    public function logout(): array
    {
        auth('sanctum')->user()->tokens()->delete();
        return [
            'message' => 'User logged out'
        ];
    }
}
