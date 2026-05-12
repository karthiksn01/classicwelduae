<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Main Admin from .env
        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@classicweld.com')],
            [
                'name' => 'ClassicWeld Admin',
                'password' => Hash::make(env('ADMIN_PASSWORD', 'password')),
                'role' => 'admin',
                'is_approved' => true,
            ]
        );

        // 2. Create Demo Users
        User::firstOrCreate(
            ['email' => 'dealer@example.com'],
            [
                'name' => 'B2B Dealer',
                'password' => Hash::make('password'),
                'role' => 'b2b',
            ]
        );

        User::firstOrCreate(
            ['email' => 'customer@example.com'],
            [
                'name' => 'B2C Customer',
                'password' => Hash::make('password'),
                'role' => 'b2c',
            ]
        );

        // 3. Create Products
        $this->call(NewProductSeeder::class);
        
        echo "Database seeded successfully!\n";
    }
}
