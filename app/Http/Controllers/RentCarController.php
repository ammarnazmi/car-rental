<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RentCar\StoreRentCarRequest;
use App\Models\RentCar;

class RentCarController extends Controller
{
    public function store(StoreRentCarRequest $storeRentCarRequest)
    {
        RentCar::create([
            'user_id' => $storeRentCarRequest->user()->id,
            'car_id' => $storeRentCarRequest->car_id,
            'start_date' => $storeRentCarRequest->start_date,
            'end_date' => $storeRentCarRequest->end_date,
            'total_price' => $storeRentCarRequest->total_price,
        ]);

        return response()->json([
            'message' =>  'success booking car',
        ], 201);
    }
}
