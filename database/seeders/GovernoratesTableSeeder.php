<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GovernoratesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('governorates')->insert([
            ['name' => 'القاهرة'],
            ['name' => 'الجيزة'],
            ['name' => 'الإسكندرية'],
            ['name' => 'الغربية'],
            ['name' => 'الدقهلية'],
            ['name' => 'أسوان'],
            ['name' => 'الأقصر'],
            ['name' => 'سوهاج'],
            ['name' => 'قنا'],
            ['name' => 'بورسعيد'],
        ]);
    }
}
