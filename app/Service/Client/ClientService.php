<?php

namespace App\Service\Client;

use App\Entity\DTO\Auth\RegisterUserDTO;
use App\Entity\DTO\Client\ClientIndexDTO;
use App\Entity\DTO\Client\ClientLoginDTO;
use App\Entity\DTO\Client\ClientStoreDTO;
use App\Entity\DTO\Client\ClientUpdateDTO;
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

    /**
     * @param ClientIndexDTO $dto
     * @return JsonResponse
     */
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

    /**
     * @param ClientUpdateDTO $dto
     * @param $id
     * @return JsonResponse
     */
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

    /**
     * @param ClientStoreDTO $dto
     * @return JsonResponse
     */
    public function signUpNewClient(RegisterUserDTO $dto): JsonResponse
    {
        try {
            $client = Client::query()->create([
                'name' => $dto->getName(),
                //'last_name' => $dto->getLastName(),
                //'age' => $dto->getAge(),
                'email' => $dto->getEmail(),
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

    /**
     * @param ClientLoginDTO $dto
     * @return JsonResponse
     */
    public function loginClient(ClientLoginDTO $dto): JsonResponse
    {
        try {
            $client = Client::query()->where('email', $dto->getEmail())->first();
            if (!$client || !Hash::check($dto->getPassword(), $client->getPassword())) {
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

    /**
     * @return string[]
     */
    public function logoutClient(): array
    {
        auth('sanctum')->user()->tokens()->delete();
        return [
            'message' => 'User logged out'
        ];
    }
}
