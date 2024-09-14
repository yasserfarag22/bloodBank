<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call(LaratrustSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BloodTypesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(DonationRequestsTableSeeder::class);
        $this->call(GovernoratesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }
}
