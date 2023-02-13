<?php

namespace App\Service\Client;

use App\Entity\DTO\Client\ClientIndexDTO;
use App\Entity\DTO\Client\ClientUpdateDTO;
use App\Http\Requests\Client\ClientIndexRequest;
use App\Http\Requests\Client\ClientUpdateRequest;
use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ClientService
{

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

    /**
     * @param $client
     * @return JsonResponse
     */
    public function responseSuccess($client): JsonResponse
    {
        return \response()->json([
            'data' => $client,
            'message' => 'Success',
        ], Response::HTTP_OK);
    }

    /**
     * @param \Exception $e
     * @return JsonResponse
     */
    public function responseError(\Exception $e): JsonResponse
    {
        return \response()->json([
            'data' => [],
            'message' => $e->getMessage(),
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

}
