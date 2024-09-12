<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('notifications')->insert([
            [
                'title' => 'حالة تبرع جديدة',
                'content' => 'هناك حالة تبرع جديدة بحاجة إلى المساعدة.',
                'donation_request_id' => 1,
            ],
            [
                'title' => 'حالة تبرع جديدة',
                'content' => 'هناك حالة تبرع جديدة بحاجة إلى المساعدة.',
                'donation_request_id' => 2,
            ],
            [
                'title' => 'حالة تبرع جديدة',
                'content' => 'هناك حالة تبرع جديدة بحاجة إلى المساعدة.',
                'donation_request_id' => 3,
            ],
            [
                'title' => 'حالة تبرع جديدة',
                'content' => 'هناك حالة تبرع جديدة بحاجة إلى المساعدة.',
                'donation_request_id' => 4,
            ],
            [
                'title' => 'حالة تبرع جديدة',
                'content' => 'هناك حالة تبرع جديدة بحاجة إلى المساعدة.',
                'donation_request_id' => 5,
            ],
          
        ]);
    }
}
