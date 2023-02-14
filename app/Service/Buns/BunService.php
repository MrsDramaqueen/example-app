<?php

namespace App\Service\Buns;
use App\Entity\DTO\Bun\BunIndexDTO;
use App\Models\Bun;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BunService
{
    public function index(): JsonResponse
    {
        try {
            $bun = Bun::all();
        } catch (\Exception $e) {
            return $this->responseError($e);
        }

        return $this->responseSuccess($bun);
    }

    public function getByParameters(BunIndexDTO $dto): JsonResponse
    {
        $parameters = [
            'name' => $dto->getName(),
            'type' => $dto->getType(),
        ];
        $query = Bun::query();
        foreach ($parameters as $field => $value) {
            $query->where($field, '=', $value, 'and');
        }
        try {
            $bun = $query->get()->all();
        } catch (\Exception $e) {
            return $this->responseError($e);
        }

        return $this->responseSuccess($bun);
    }

    public function store(BunIndexDTO $dto): JsonResponse
    {
        try {
            $bun = Bun::query()->create([
                    'name' => $dto->getName(),
                    'type' => $dto->getType(),
                ]
            );
        } catch (\Exception $e) {
            return $this->responseError($e);
        }
        return $this->responseSuccess($bun);
    }

    /**
     * @param $bun
     * @return JsonResponse
     */
    public function responseSuccess($bun): JsonResponse
    {
        return \response()->json([
            'data' => $bun,
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
