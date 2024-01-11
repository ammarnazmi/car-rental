<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Robert Street',
                'email' => 'robbstreet@test.com',
                'phone' => '60194807962',
                'password' => Hash::make('password_123'),
            ],
            [
                'name' => 'Hendry Tionardi',
                'email' => 'hendrytio0@test.com',
                'phone' => '601155000000',
                'password' => Hash::make('password_123'),
            ],
            [
                'name' => 'Fabian Ahmed',
                'email' => 'fabianahmed1@test.com',
                'phone' => '60338383937',
                'password' => Hash::make('password_123'),
            ],
            [
                'name' => 'Srinivasan G',
                'email' => 'srinivasrajan@test.com',
                'phone' => '60160250594',
                'password' => Hash::make('password_123'),
            ],
            [
                'name' => 'Jason Wang',
                'email' => 'wanghau@test.com',
                'phone' => '601146000000',
                'password' => Hash::make('password_123'),
            ],
            [
                'name' => 'Dzulkarnaen Deo',
                'email' => 'akalaiselvendeo@test.com',
                'phone' => '601594000000',
                'password' => Hash::make('password_123'),
            ],
        ]);
    }
}
