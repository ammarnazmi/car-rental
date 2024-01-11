<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Http\Requests\Car\GetAllCarRequest;

class CarController extends Controller
{
    public function index(GetAllCarRequest $getAllCarRequest) {
        $cars = Car::query()->when($getAllCarRequest->has('filter.car_model'), function($query) use($getAllCarRequest) {
            $query->where('vehicle_name', 'LIKE', "%{$getAllCarRequest->filter['car_model']}%");
        })->when($getAllCarRequest->has('filter.manufacturer'), function($query) use($getAllCarRequest) {
            $query->where('manufacturer', $getAllCarRequest->filter['manufacturer']);
        })->when($getAllCarRequest->has('filter.minPrice'), function($query) use($getAllCarRequest) {
            $query->where('price', '>=', $getAllCarRequest->filter['minPrice']);
        })->when($getAllCarRequest->has('filter.maxPrice'), function($query) use($getAllCarRequest) {
            $query->where('price', '<=', $getAllCarRequest->filter['maxPrice']);
        })->paginate(20);

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
