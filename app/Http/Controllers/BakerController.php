<?php

namespace App\Http\Controllers;

use App\Http\Requests\Baker\BakerShowRequest;
use App\Http\Requests\Baker\BakerStoreRequest;
use App\Http\Requests\Baker\BakerUpdateRequest;
use App\Models\Baker;
use App\Service\Baker\BakerService;
use Symfony\Component\HttpFoundation\Response;

class BakerController extends Controller
{

    public function index(BakerService $service): \Illuminate\Http\JsonResponse
    {
        return $service->index();
    }

    public function store(BakerService $service, BakerStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        return $service->store($request);
    }

    public function show(BakerService $service, $id): \Illuminate\Http\JsonResponse
    {
        return $service->show($id);
    }

    public function update(BakerService $service, BakerUpdateRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        return $service->update($request, $id);
    }

    public function destroy(BakerService $service, $id): \Illuminate\Http\JsonResponse
    {
        return $service->destroy($id);
    }

}
