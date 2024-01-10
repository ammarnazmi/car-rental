<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Http\Requests\Car\GetAllCarRequest;

class CarController extends Controller
{
    public function index(GetAllCarRequest $getAllCarRequest) {
        $cars = Car::query()->when($getAllCarRequest->has('filter.status'), function($query) use ($getAllCarRequest) {
            $query->where('status', $getAllCarRequest->filter['status']);
        })->paginate($getAllCarRequest->per_page);

        return response()->json([
            'cars' => $cars,
        ], 200);
    }

    public function overview() {
        $TotalFreeCarStatus = Car::where('status', Car::STATUS_FREE)->count();
        $TotalBookedCarStatus = Car::where('status', Car::STATUS_BOOKED)->count();

        return response()->json([
            'free' => $TotalFreeCarStatus,
            'booked' => $TotalBookedCarStatus,
        ], 200);
    }
}
