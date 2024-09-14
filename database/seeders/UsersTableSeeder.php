<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        $user = User::updateOrCreate(
            ['email' => 'yasserfarag575@gmail.com'], 
            [
                'name' => 'super admin',
                'password' => bcrypt('123456789'), 
            ]
        );

        
   
    }
}
