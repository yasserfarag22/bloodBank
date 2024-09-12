<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->insert([
            [
                'notification_setting_text' => 'سيتم إشعارك عند وجود حالات تبرع جديدة.',
                'about_app' => 'تطبيق للتبرع بالدم يسهل على المتبرعين والمتلقين التواصل.',
                'phone' => '0123456789',
                'email' => 'info@example.com',
                'fb_link' => 'https://facebook.com/example',
                'tw_link' => 'https://twitter.com/example',
                'wa_link' => 'https://wa.me/123456789',
                'insta_link' => 'https://instagram.com/example',
            ],
            
        ]);
    }
}
