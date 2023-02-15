<?php

namespace App\Service\Client;

use App\Entity\DTO\Client\ClientIndexDTO;
use App\Entity\DTO\Client\ClientLoginDTO;
use App\Entity\DTO\Client\ClientStoreDTO;
use App\Entity\DTO\Client\ClientUpdateDTO;
use App\Http\Requests\Client\ClientIndexRequest;
use App\Http\Requests\Client\ClientUpdateRequest;
use App\Models\Client;
use App\Service\Traits\Responses;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class ClientService
{
    use Responses;

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $client = Client::all();
        } catch (\Exception $e) {
            return $this->responseError($e);
        }

        return $this->responseSuccess($client);
    }

    public function getByParameters(ClientIndexDTO $dto): JsonResponse
    {
        $parameters = [
            'name' => $dto->getName(),
            'last_name' => $dto->getLastName(),
            'age' => $dto->getAge(),
        ];
        $query = Client::query();
        foreach ($parameters as $field => $value) {
            $query->where($field, '=', $value, 'and');
        }
        try {
            $client = $query->get()->all();
        } catch (\Exception $e) {
            return $this->responseError($e);
        }

        return $this->responseSuccess($client);
    }

    public function update(ClientUpdateDTO $dto, $id): JsonResponse
    {
        try {
            $client = Client::query()->findOrFail($id)->update([
                'name' => $dto->getName(),
                'last_name' => $dto->getLastName(),
                'age' => $dto->getAge(),
            ]);
        } catch (\Exception $e) {
            return $this->responseError($e);
        }
        return $this->responseSuccess($client);
    }

    public function signUpNewClient(ClientStoreDTO $dto): JsonResponse
    {
        try {
            $clientData = [
                'name' => $dto->getName(),
                'last_name' => $dto->getLastName(),
                'age' =>$dto->getAge(),
                'email' => $dto->getEmail(),
                'password' => $dto->getPassword(),
            ];
            $client = Client::query()->create([
                'name' => $clientData['name'],
                'last_name' => $clientData['last_name'],
                'age' => $clientData['age'],
                'email' => $clientData['email'],
                'password' => bcrypt($clientData['password']),
            ]);
        } catch (\Exception $e) {
            return $this->responseError($e);
        }
        $token = $client->createToken('apiToken')->plainTextToken;
        $result = [
            'client' => $client,
            'token' => $token,
        ];

        return $this->responseSuccess($result);
    }

    public function loginClient(ClientLoginDTO $dto): JsonResponse
    {
        $clientData = [
            'email' => $dto->getEmail(),
            'password' => $dto->getPassword(),
        ];
        try {
            $client = Client::query()->where('email', $clientData['email'])->first();
            if (!$client || !Hash::check($clientData['password'], $client->getPassword())) {
                return response()->json([
                    'message' => 'Incorrect username or password',
                ], Response::HTTP_FORBIDDEN);
            }
        } catch (\Exception $e) {
            return $this->responseError($e);
        }

        $token = $client->createToken('apiToken')->plainTextToken;
        $result = [
            'user' => $client,
            'token' => $token
        ];

        return $this->responseSuccess($result);
    }

    public function logoutClient(): array
    {
        auth('sanctum')->user()->tokens()->delete();
        return [
            'message' => 'User logged out'
        ];
    }
}
