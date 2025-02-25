<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    public function run(): void
    {
        Vehicle::create([
            'type' => 'Mercedes Class E (Sedan)',
            'base_price' => 30.00,
            'rate_per_km' => 2.00,
            'rate_per_minute' => 0.50,
            'max_passengers' => 4,
        ]);

        Vehicle::create([
            'type' => 'Mercedes Van Class V (Van)',
            'base_price' => 50.00,
            'rate_per_km' => 2.50,
            'rate_per_minute' => 0.60,
            'max_passengers' => 7,
        ]);
    }
}