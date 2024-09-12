<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            ['name' => 'حلوان', 'governorate_id' => 1],
            ['name' => 'الزمالك', 'governorate_id' => 1],
            ['name' => 'الجيزة', 'governorate_id' => 2],
            ['name' => 'العجمي', 'governorate_id' => 3],
            ['name' => 'سموحه', 'governorate_id' => 3],
            ['name' => 'طنطا', 'governorate_id' => 4],
            ['name' => 'المنصورة', 'governorate_id' => 5],
            ['name' => 'شربين', 'governorate_id' => 5],
            ['name' => 'أسوان', 'governorate_id' => 6],
            ['name' => 'الأقصر', 'governorate_id' => 7],
            ['name' => 'سوهاج', 'governorate_id' => 8],
            ['name' => 'قنا', 'governorate_id' => 9],
            ['name' => 'بورسعيد', 'governorate_id' => 10],
        ]);
    }
}
