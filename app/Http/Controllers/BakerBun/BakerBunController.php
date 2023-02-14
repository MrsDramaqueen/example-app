<?php

namespace App\Http\Controllers\BakerBun;

use App\Http\Controllers\Controller;
use App\Http\Requests\BakerBun\BakerBunRequest;
use App\Models\Baker;
use App\Models\BakerBun;
use App\Models\Bun;
use App\Service\BakerBun\BakerBunService;
use Illuminate\Http\JsonResponse;

class BakerBunController extends Controller
{
   public function showBakerName(BakerBunService $service)
   {
       return $service->showBakerName();
   }

   public function store(BakerBunService $service, BakerBunRequest $request): JsonResponse
   {
       return $service->store($request->getCreateDTO());
   }

   public function listALLBakerBuns(BakerBunService $service, BakerBunRequest $request): JsonResponse
   {
       if (empty($request->all())) {
           $result = $service->showAllListBakerBuns();
       } else {
           $result = $service->showListBakerBunsByParameter($request->getCreateDTO());
       }
       return $result;
   }

   public function destroy(BakerBunService $service, $id): JsonResponse
   {
       return $service->destroy($id);
   }

}
