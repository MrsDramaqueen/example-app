<?php

namespace App\Service\Baker;

use App\Http\Requests\Baker\BakerIndexRequest;
use App\Http\Requests\Baker\BakerShowRequest;
use App\Http\Requests\Baker\BakerStoreRequest;
use App\Http\Requests\Baker\BakerUpdateRequest;
use App\Models\Baker;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class BakerService
{

    /**
     * @param BakerIndexRequest $request
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $baker = Baker::all();
        } catch (\Exception $e) {
            return $this->responseError($e);
        }

        return $this->responseSuccess($baker);
    }

    /**
     * @param BakerIndexRequest $request
     * @return JsonResponse
     */
    public function getByParameters(BakerIndexRequest $request): JsonResponse
    {
        $parameters = $request->all();
        $query = Baker::query();
        foreach ($parameters as $field => $value) {
            $query->where($field, '=', $value, 'and');
        }
        try {
            $baker = $query->get()->all();
        } catch (\Exception $e) {
            return $this->responseError($e);
        }

        return $this->responseSuccess($baker);
    }

    /**
     * @param BakerStoreRequest $request
     * @return JsonResponse
     */
    public function store(BakerStoreRequest $request): JsonResponse
    {
        try {
            $baker = Baker::query()->create($request->all());
        } catch (\Exception $e) {
            return $this->responseError($e);
        }

        return $this->responseSuccess($baker);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        try {
            $baker = Baker::query()->findOrFail($id);
        } catch (\Exception $e) {
            return $this->responseError($e);
        }

        return $this->responseSuccess($baker);
    }

    /**
     * @param BakerUpdateRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(BakerUpdateRequest $request, $id): JsonResponse
    {
        try {
            $baker = Baker::query()->findOrFail($id)->update($request->all());
        } catch (\Exception $e) {
            return $this->responseError($e);
        }

        return $this->responseSuccess($baker);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        try {
            $baker = Baker::destroy($id);
        } catch (\Exception $e) {
            return $this->responseError($e);
        }

        return $this->responseSuccess($baker);
    }

    /**
     * @param $baker
     * @return JsonResponse
     */
    public function responseSuccess($baker): JsonResponse
    {
        return \response()->json([
            'data' => $baker,
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
