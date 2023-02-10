<?php

namespace App\Service\Baker;

use App\Http\Requests\Baker\BakerStoreRequest;
use App\Http\Requests\Baker\BakerUpdateRequest;
use App\Models\Baker;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class BakerService
{

    public function index(): JsonResponse
    {
        try {
            $baker = Baker::all();
        } catch (\Exception $e) {
            return $this->responseError($e);
        }

        return $this->responseSuccess($baker);
    }

    public function store(BakerStoreRequest $request): JsonResponse
    {
        try {
            $baker = Baker::query()->create($request->all());
        } catch (\Exception $e) {
            return $this->responseError($e);
        }

        return $this->responseSuccess($baker);
    }

    public function show($id): JsonResponse
    {
        try {
            $baker = Baker::query()->findOrFail($id);
        } catch (\Exception $e) {
            return $this->responseError($e);
        }

        return $this->responseSuccess($baker);
    }

    public function update(BakerUpdateRequest $request, $id): JsonResponse
    {
        try {
            $baker = Baker::query()->findOrFail($id)->update($request->all());
        } catch (\Exception $e) {
            return $this->responseError($e);
        }

        return $this->responseSuccess($baker);
    }

    public function destroy($id): JsonResponse
    {
        try {
            $baker = Baker::destroy($id);
        } catch (\Exception $e) {
            return $this->responseError($e);
        }

        return $this->responseSuccess($baker);
    }

    public function responseSuccess($baker): JsonResponse
    {
        return \response()->json([
            'data' => $baker,
            'message' => 'Success',
        ], Response::HTTP_OK);
    }

    public function responseError(\Exception $e): JsonResponse
    {
        return \response()->json([
            'data' => [],
            'message' => $e->getMessage(),
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

}
