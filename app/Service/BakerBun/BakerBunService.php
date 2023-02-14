<?php

namespace App\Service\BakerBun;

use App\Entity\DTO\BakerBun\BakerBunCreateOrderDTO;
use App\Http\Requests\BakerBun\BakerBunRequest;
use App\Models\Baker;
use App\Models\BakerBun;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BakerBunService
{
    public function store(BakerBunCreateOrderDTO $dto): JsonResponse
    {
        try {
            $order = BakerBun::query()->create([
                'name' => $dto->getName(),
                'type' => $dto->getType(),
                'client_id' => $dto->getClientId(),
                'baker_id' => $dto->getBakerId(),
            ]);
        } catch (\Exception $e) {
            return $this->responseError($e);
        }
        return $this->responseSuccess($order);
    }

    public function showAllListBakerBuns(): JsonResponse
    {
        try {
            $list = BakerBun::all();
        } catch (\Exception $e) {
            return $this->responseError($e);
        }

        return $this->responseSuccess($list);
    }

    public function showListBakerBunsByParameter(BakerBunCreateOrderDTO $dto): JsonResponse
    {
        $parameters = [
            'name' => $dto->getName(),
            'type' => $dto->getType(),
            'client_id' => $dto->getClientId(),
            'baker_id' => $dto->getBakerId(),
        ];
        $query = BakerBun::query();
        foreach ($parameters as $field => $value) {
            $query->where($field, '=', $value, 'and');
        }
        try {
            $list = $query->get()->all();
        } catch (\Exception $e) {
            return $this->responseError($e);
        }
        return $this->responseSuccess($list);
    }

    public function destroy($id): JsonResponse
    {
        try {
            $order = BakerBun::destroy($id);
        } catch (\Exception $e) {
            return $this->responseError($e);
        }

        return $this->responseSuccess($order);
    }

    /**
     * @param $order
     * @return JsonResponse
     */
    public function responseSuccess($order): JsonResponse
    {
        return \response()->json([
            'data' => $order,
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
