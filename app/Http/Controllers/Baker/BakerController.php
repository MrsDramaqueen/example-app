<?php

namespace App\Http\Controllers\Baker;

use App\Http\Controllers\Controller;
use App\Http\Requests\Baker\BakerIndexRequest;
use App\Http\Requests\Baker\BakerStoreRequest;
use App\Http\Requests\Baker\BakerUpdateRequest;
use App\Models\Baker;
use App\Models\Client;
use App\Service\Baker\BakerService;
use Illuminate\Http\JsonResponse;

class BakerController extends Controller
{

    /**
     * @param BakerService $service
     * @param BakerIndexRequest $request
     * @return JsonResponse
     */
    public function index(BakerService $service, BakerIndexRequest $request): JsonResponse
    {
        if (empty($request->all())) {
            $result = $service->index();
        } else {
            $result = $service->getByParameters($request->getIndexDTO());
        }
        return $result;
    }

    /**
     * @param BakerService $service
     * @param BakerStoreRequest $request
     * @return JsonResponse
     */
    public function store(BakerService $service, BakerStoreRequest $request): JsonResponse
    {
        return $service->store($request->getStoreDTO());
    }

    /**
     * @param BakerService $service
     * @param $id
     * @return JsonResponse
     */
    public function show(BakerService $service, $id): JsonResponse
    {
        return $service->show($id);
    }

    /**
     * @param BakerService $service
     * @param BakerUpdateRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(BakerService $service, BakerUpdateRequest $request, $id): JsonResponse
    {
        return $service->update($request->getUpdateDTO(), $id);
    }

    /**
     * @param BakerService $service
     * @param $id
     * @return JsonResponse
     */
    public function destroy(BakerService $service, $id): JsonResponse
    {
        return $service->destroy($id);
    }

}
