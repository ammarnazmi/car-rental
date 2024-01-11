<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    const STATUS_FREE = 'free';
    const STATUS_RESERVED = 'reserved';
    const STATUS_BOOKED = 'booked';

    const ALL_STATUS = [
        self::STATUS_FREE,
        self::STATUS_RESERVED,
        self::STATUS_BOOKED,
    ];

    public function rentCars()
    {
        return $this->hasMany(RentCar::class);
    }
}
