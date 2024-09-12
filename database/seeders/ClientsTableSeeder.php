<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('clients')->insert([
            [
                'name' => 'محمد علي',
                'email' => 'mohamed@example.com',
                'phone' => '0123456789',
                'password' => Hash::make('password123'),
                'blood_type_id' => 1,
                'date_of_birth' => '1990-01-01',
                'last_donation_date' => '2023-01-01',
                'city_id' => 1,
                'is_active'=>1,
                'pin_code' => '1234',
            ],
            [
                'name' => 'ابراهيم محمد',
                'email' => 'ebrahim@example.com',
                'phone' => '01012458637',
                'password' => Hash::make('password1234'),
                'blood_type_id' => 2,
                'date_of_birth' => '2002-01-01',
                'last_donation_date' => '2023-06-01',
                'city_id' => 2,
                'is_active'=>1,
                'pin_code' => '1478',
            ],
            [
                'name' => 'ياسر فرج',
                'email' => 'yas44ser@example.com',
                'phone' => '01012158637',
                'password' => Hash::make('password12345'),
                'blood_type_id' => 3,
                'date_of_birth' => '2001-01-01',
                'last_donation_date' => '2024-06-01',
                'city_id' => 6,
                'is_active'=>2,
                'pin_code' => '1378',
            ],
            [
                'name' => 'hfv فرج',
                'email' => 'yasse4r@example.com',
                'phone' => '01012158637',
                'password' => Hash::make('password12345'),
                'blood_type_id' => 4,
                'date_of_birth' => '2001-01-01',
                'last_donation_date' => '2024-06-01',
                'city_id' => 5,
                'is_active'=>2,
                'pin_code' => '1378',
            ],
        ]);
    }
}
