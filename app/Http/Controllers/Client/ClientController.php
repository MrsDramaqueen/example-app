<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ClientIndexRequest;
use App\Http\Requests\Client\ClientLoginRequest;
use App\Http\Requests\Client\ClientRegisterRequest;
use App\Http\Requests\Client\ClientUpdateRequest;
use App\Service\Client\ClientService;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    public function index(ClientService $service, ClientIndexRequest $request): JsonResponse
    {
        if (empty($request->all())) {
            $result = $service->index();
        } else {
            $result = $service->getByParameters($request->getIndexDTO());
        }
        return $result;
    }

    public function update(ClientService $service, ClientUpdateRequest $request, $id): JsonResponse
    {
        return $service->update($request->getUpdateDTO(), $id);
    }

    public function signUpNewClient(ClientService $service, ClientRegisterRequest $request): JsonResponse
    {
        return $service->signUpNewClient($request->getRegisterDTO());
    }

    public function loginClient(ClientService $service, ClientLoginRequest $request): JsonResponse
    {
        return $service->loginClient($request->getLoginDTO());
    }
}
