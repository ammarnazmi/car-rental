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

    public function history(Request $request)
    {
       $rentCars = RentCar::with(['car'])
            ->where('user_id', $request->user()->id)
            ->orderBy('end_date', 'desc')
            ->get();

        return response()->json([
            'history' => $rentCars,
        ], 200);
    }
}
