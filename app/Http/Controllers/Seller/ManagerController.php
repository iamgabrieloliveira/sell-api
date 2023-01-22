<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\CreateSellerRequest;
use App\Models\Seller;
use Illuminate\Http\JsonResponse;

class ManagerController extends Controller
{
    public function post(CreateSellerRequest $request): JsonResponse
    {
        $seller = new Seller();
        $seller->name = $request->getName();
        $seller->email = $request->getEmail();
        $seller->save();

        return response()->json([
           'seller_id' => $seller->getKey(),
        ]);
    }
}
