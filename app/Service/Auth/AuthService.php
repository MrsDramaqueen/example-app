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
    public function registerNewUser(RegisterUserDTO $dto): JsonResponse
    {
        try {
            $user = User::query()->create([
                'name' => $dto->getName(),
                'email' => $dto->getEmail(),
                'password' => bcrypt($dto->getPassword()),
                'user_id' => $dto->getUserId(),
                'user_type' => $dto->getUserType(),
            ]);

           switch ($user['user_type']) {
               case 'clients':
                   /*$user = User::query()->find($user['user_id']);
                   $userClassType = $user->userClassType()->getEmail();
                   $userClass = (new ClientService)->signUpNewClient($userClassType);*/
                   $userClass = (new ClientService)->signUpNewClient($dto);
                   break;
               case 'bakers':
                   $userClass = (new BakerService)->store($dto);
                   break;
           }

        } catch (\Exception $e) {
            return $this->responseError($e);
        }
        return $this->responseSuccess($userClass);
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
