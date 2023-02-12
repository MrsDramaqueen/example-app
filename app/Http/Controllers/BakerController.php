<?php

namespace App\Http\Controllers;

use App\Http\Requests\Baker\BakerIndexRequest;
use App\Http\Requests\Baker\BakerShowRequest;
use App\Http\Requests\Baker\BakerStoreRequest;
use App\Http\Requests\Baker\BakerUpdateRequest;
use App\Models\Baker;
use App\Service\Baker\BakerService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BakerController extends Controller
{

    /**
     * @param BakerService $service
     * @param BakerIndexRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(BakerService $service, BakerIndexRequest $request): \Illuminate\Http\JsonResponse
    {
        if (empty($request->all())) {
            $result = $service->index();
        } else {
            $result = $service->getByParameters($request);
        }
        return $result;
    }

    /**
     * @param BakerService $service
     * @param BakerStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(BakerService $service, BakerStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        return $service->store($request);
    }

    /**
     * @param BakerService $service
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(BakerService $service, $id): \Illuminate\Http\JsonResponse
    {
        return $service->show($id);
    }

    /**
     * @param BakerService $service
     * @param BakerUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(BakerService $service, BakerUpdateRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        return $service->update($request, $id);
    }

    /**
     * @param BakerService $service
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(BakerService $service, $id): \Illuminate\Http\JsonResponse
    {
        return $service->destroy($id);
    }

}
