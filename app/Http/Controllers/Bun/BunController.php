<?php

namespace App\Http\Controllers\Bun;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bun\BunIndexRequest;
use App\Http\Requests\Bun\BunStoreRequest;
use App\Service\Buns\BunService;
use Illuminate\Http\JsonResponse;

class BunController extends Controller
{
    public function index(BunService $service, BunIndexRequest $request): JsonResponse
    {
        if (empty($request->all())) {
            $result = $service->index();
        } else {
            $result = $service->getByParameters($request->getIndexDTO());
        }
        return $result;
    }

    public function store(BunService $service, BunStoreRequest $request): JsonResponse
    {
        return $service->store($request->getStoreDTO());
    }
}
