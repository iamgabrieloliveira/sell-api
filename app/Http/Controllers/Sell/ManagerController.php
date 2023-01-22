<?php

namespace App\Http\Controllers\Sell;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sell\CreateSellRequest;
use App\Models\Sell;
use App\Models\Seller;
use Illuminate\Http\JsonResponse;

class ManagerController extends Controller
{
    public function post(Seller $seller, CreateSellRequest $request): JsonResponse
    {
        $sell = new Sell();
        $sell->value = $request->getValue();
        $sell->seller_id = $seller->getKey();
        $sell->save();

        return response()->json([
           'name' => $seller->name,
           'email' => $seller->email,
           'commission_value' => $sell->getSellerCommission(),
        ]);
    }
}
