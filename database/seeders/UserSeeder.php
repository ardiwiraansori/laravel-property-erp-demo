<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@property-erp.test'],
            [
                'name' => 'Demo Admin',
                'password' => Hash::make('password'),
                'phone' => '6281234567890',
                'location' => 'Jakarta, Indonesia',
                'about_me' => 'Demo account untuk portfolio Laravel Property ERP.',
            ]
        );
    }
}
