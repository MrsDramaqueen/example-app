<?php

namespace App\Service\Baker;

use App\Entity\DTO\Baker\BakerIndexDTO;
use App\Entity\DTO\Baker\BakerStoreDTO;
use App\Entity\DTO\Baker\BakerUpdateDTO;
use App\Models\Baker;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BakerService
{

    /**
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
     * @param BakerIndexDTO $dto
     * @return JsonResponse
     */
    public function getByParameters(BakerIndexDTO $dto): JsonResponse
    {
        $parameters = [
            'name' => $dto->getName(),
            'last_name' => $dto->getLastName(),
            'age' => $dto->getAge(),
        ];
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
     * @param BakerStoreDTO $dto
     * @return JsonResponse
     */
    public function store(BakerStoreDTO $dto): JsonResponse
    {
        try {
            $baker = Baker::query()->create([
                'name' => $dto->getName(),
                'last_name' => $dto->getLastName(),
                'age' => $dto->getAge(),
                ]
            );
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
     * @param BakerUpdateDTO $dto
     * @param $id
     * @return JsonResponse
     */
    public function update(BakerUpdateDTO $dto, $id): JsonResponse
    {
        try {
            $baker = Baker::query()->findOrFail($id)->update([
                'name' => $dto->getName(),
                'last_name' => $dto->getLastName(),
                'age' => $dto->getAge(),
            ]);
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
