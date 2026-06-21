<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    public function run(): void
    {
        $units = [
            [
                'property_name' => 'Emerald Residence',
                'block_name' => 'Cluster A',
                'unit_number' => 'A-012',
                'unit_type' => 'Type 45/90',
                'land_area' => 90,
                'building_area' => 45,
                'bedrooms' => 2,
                'bathrooms' => 1,
                'price' => 685000000,
                'booking_fee' => 5000000,
                'status' => 'booked',
                'notes' => 'Booked by Rina Wijaya.',
            ],
            [
                'property_name' => 'Emerald Residence',
                'block_name' => 'Cluster B',
                'unit_number' => 'B-0807',
                'unit_type' => 'Type 36/72',
                'land_area' => 72,
                'building_area' => 36,
                'bedrooms' => 2,
                'bathrooms' => 1,
                'price' => 540000000,
                'booking_fee' => 5000000,
                'status' => 'occupied',
                'notes' => 'Already handed over.',
            ],
            [
                'property_name' => 'Sakura Hills',
                'block_name' => 'Cluster Sakura',
                'unit_number' => 'C-0210',
                'unit_type' => 'Type 60/120',
                'land_area' => 120,
                'building_area' => 60,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'price' => 920000000,
                'booking_fee' => 10000000,
                'status' => 'available',
                'notes' => 'Ready stock.',
            ],
        ];

        foreach ($units as $unit) {
            Unit::updateOrCreate(
                ['unit_number' => $unit['unit_number']],
                $unit
            );
        }
    }
}