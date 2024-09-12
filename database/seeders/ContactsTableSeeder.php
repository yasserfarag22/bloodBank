<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('contacts')->insert([
            [
                'client_id' => 1,
                'name' => 'أحمد محمود',
                'email' => 'ahmed@example.com',
                'subject' => 'استفسار',
                'message' => 'أرغب في معرفة مواعيد التبرع بالدم.',
            ],
            [
                'client_id' => 2,
                'name' => 'ياسر فرج',
                'email' => 'yasser@example.com',
                'subject' => 'استفسار',
                'message' => 'أرغب في معرفة مواعيد التبرع بالدم.',
            ],
        
        ]);
    }
}
