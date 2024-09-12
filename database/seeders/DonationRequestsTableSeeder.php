<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonationRequestsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('donation_requests')->insert([
            [
                'client_id' => 1,
                'name' => 'علي عبد الله',
                'phone' => '0123456789',
                'city_id' => 1,
                'hospital_name' => 'مستشفى السلام',
                'blood_type_id' => 1,
                'age' => 30,
                'bags' => 2,
                'hospital_location' => 'شارع السلام، القاهرة',
                'details' => 'حالة طارئة تحتاج إلى نقل دم.',
                'latitude' => 30.0444,
                'longitude' => 31.2357,
            ],
            [
                'client_id' => 2,
                'name' => 'علي محمد',
                'phone' => '01243456789',
                'city_id' => 2,
                'hospital_name' => 'مستشفى العام',
                'blood_type_id' => 3,
                'age' => 30,
                'bags' => 1,
                'hospital_location' => 'شارع السلام، القاهرة',
                'details' => 'حالة طارئة تحتاج إلى نقل دم.',
                'latitude' => 30.0444,
                'longitude' => 31.2357,
            ],
            [
                'client_id' => 3,
                'name' => ' محسن',
                'phone' => '0123455589',
                'city_id' => 4,
                'hospital_name' => 'مستشفى السلام',
                'blood_type_id' => 5,
                'age' => 30,
                'bags' => 2,
                'hospital_location' => 'شارع السلام، القاهرة',
                'details' => 'حالة طارئة تحتاج إلى نقل دم.',
                'latitude' => 30.0444,
                'longitude' => 31.2357,
            ],
            [
                'client_id' => 4,
                'name' => 'ابراهيم عبد الله',
                'phone' => '01004659424',
                'city_id' => 6,
                'hospital_name' => 'مستشفى السلام',
                'blood_type_id' => 3,
                'age' => 30,
                'bags' => 3,
                'hospital_location' => 'شارع السلام، القاهرة',
                'details' => 'حالة طارئة تحتاج إلى نقل دم.',
                'latitude' => 30.0444,
                'longitude' => 31.2357,
            ],
            
        ]);
    }
}
