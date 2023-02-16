<?php

namespace App\Service\BakerBun;

use App\Entity\DTO\BakerBun\BakerBunCreateOrderDTO;
use App\Models\BakerBun;
use App\Service\Client\ClientService;
use App\Service\Traits\Responses;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class BakerBunService
{
    use Responses;

    /**
     * @param BakerBunCreateOrderDTO $dto
     * @return JsonResponse
     */
    public function store(BakerBunCreateOrderDTO $dto): JsonResponse
    {
        try {
            $order = BakerBun::query()->create([
                'name' => $dto->getName(),
                'type' => $dto->getType(),
                'client_id' => $dto->getClientId(),
                'baker_id' => $dto->getBakerId(),
            ]);
            if (Auth::id() != $order['client_id']) {
                return response()->json([
                    'You cant create order for this user',
                ], Response::HTTP_FORBIDDEN);
            }
        } catch (\Exception $e) {
            return $this->responseError($e);
        }
        return $this->responseSuccess($order);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        try {
            $order = BakerBun::query()->findOrFail($id);
        } catch (\Exception $e) {
            return $this->responseError($e);
        }
        return $this->responseSuccess($order);
    }

    /**
     * @return JsonResponse
     */
    public function showAllListBakerBuns(): JsonResponse
    {
        try {
            $list = BakerBun::all();
        } catch (\Exception $e) {
            return $this->responseError($e);
        }
        return $this->responseSuccess($list);
    }

    /**
     * @param BakerBunCreateOrderDTO $dto
     * @return JsonResponse
     */
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

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        try {
            $order = BakerBun::destroy($id);
        } catch (\Exception $e) {
            return $this->responseError($e);
        }
        return $this->responseSuccess($order);
    }
}
