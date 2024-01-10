<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            ['manufacturer' => 'Perodua', 'vehicle_name' => 'Alza 1.5 (A)', 'price' => 245, 'status' => 'free'],
            ['manufacturer' => 'Perodua', 'vehicle_name' => 'Aruz 1.5 (A)', 'price' => 290, 'status' => 'free'],
            ['manufacturer' => 'Perodua', 'vehicle_name' => 'Ativa 1.0 (A)', 'price' => 310, 'status' => 'free'],
            ['manufacturer' => 'Perodua', 'vehicle_name' => 'Axia 2023 1.0 (A)', 'price' => 140, 'status' => 'free'],
            ['manufacturer' => 'Perodua', 'vehicle_name' => 'Bezza 1.3 (A)', 'price' => 170, 'status' => 'free'],
            ['manufacturer' => 'Proton', 'vehicle_name' => 'Ertiga 1.4 (A)', 'price' => 300, 'status' => 'free'],
            ['manufacturer' => 'Proton', 'vehicle_name' => 'Perdana 2.0 (A)', 'price' => 460, 'status' => 'free'],
            ['manufacturer' => 'Proton', 'vehicle_name' => 'X50 1.5 (A)', 'price' => 400, 'status' => 'free'],
            ['manufacturer' => 'Proton', 'vehicle_name' => 'X70 1.5 (A)', 'price' => 475, 'status' => 'free'],
            ['manufacturer' => 'Proton', 'vehicle_name' => 'X90 1.5 (A)', 'price' => 550, 'status' => 'free'],
            ['manufacturer' => 'Mazda', 'vehicle_name' => 'CX-5 2.0 (A)', 'price' => 599, 'status' => 'free'],
            ['manufacturer' => 'Mazda', 'vehicle_name' => 'CX-6 2.5 (A)', 'price' => 640, 'status' => 'free'],
            ['manufacturer' => 'Mazda', 'vehicle_name' => 'CX3 2.0 (A)', 'price' => 460, 'status' => 'free'],
            ['manufacturer' => 'Toyota', 'vehicle_name' => 'Alphard 2.4 (A)', 'price' => 729, 'status' => 'free'],
            ['manufacturer' => 'Toyota', 'vehicle_name' => 'C-HR 1.8 (A)', 'price' => 599, 'status' => 'free'],
            ['manufacturer' => 'Toyota', 'vehicle_name' => 'Camry 2.0 (A)', 'price' => 450, 'status' => 'free'],
            ['manufacturer' => 'Toyota', 'vehicle_name' => 'Corolla Altis 1.8 (A)', 'price' => 480, 'status' => 'free'],
            ['manufacturer' => 'Honda', 'vehicle_name' => 'Accord 2.0 (A)', 'price' => 550, 'status' => 'free'],
            ['manufacturer' => 'Honda', 'vehicle_name' => 'City Hatchback 1.5 (A)', 'price' => 300, 'status' => 'free'],
            ['manufacturer' => 'Honda', 'vehicle_name' => 'Civic 1.5 (A)', 'price' => 550, 'status' => 'free'],
        ]);
    }
}
