<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Users
        // 1. Create Users
        // 1. Create 5 Admins for Consensus Testing
        for ($i = 1; $i <= 5; $i++) {
            User::updateOrCreate(
                ['email' => "admin{$i}@classicweld.com"],
                [
                    'name' => "Admin User {$i}",
                    'password' => bcrypt('password'),
                    'role' => 'admin',
                    'is_approved' => true,
                ]
            );
        }

        // Original Admin (Optional, keeping for backward compatibility if needed)
        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'santhoshnadamritham@classicweld.com')],
            [
                'name' => 'Main Admin',
                'password' => bcrypt(env('ADMIN_PASSWORD', 'Santhosh@nada')),
                'role' => 'admin',
                'is_approved' => true,
            ]
        );

        User::firstOrCreate(
            ['email' => 'dealer@example.com'],
            [
                'name' => 'B2B Dealer',
                'password' => bcrypt('password'),
                'role' => 'b2b',
            ]
        );

        User::firstOrCreate(
            ['email' => 'customer@example.com'],
            [
                'name' => 'B2C Customer',
                'password' => bcrypt('password'),
                'role' => 'b2c',
            ]
        );

        // 2. Create Products
        $this->call(NewProductSeeder::class);

        // 3. Create Dummy Transactions for B2B Dealer
        $dealer = User::where('email', 'dealer@example.com')->first();
        if ($dealer) {
            $transactions = [
                ['amount' => 5000.00, 'type' => 'payment', 'status' => 'completed', 'description' => 'Initial deposit', 'reference_id' => 'TXN-1001'],
                ['amount' => 1250.50, 'type' => 'invoice', 'status' => 'pending', 'description' => 'Invoice #INV-2024-001 - Welding Wire', 'reference_id' => 'INV-2024-001'],
                ['amount' => 3200.00, 'type' => 'invoice', 'status' => 'completed', 'description' => 'Invoice #INV-2023-099 - Machines', 'reference_id' => 'INV-2023-099'],
                ['amount' => 150.00, 'type' => 'refund', 'status' => 'completed', 'description' => 'Refund for damaged goods', 'reference_id' => 'RF-552'],
            ];

            foreach ($transactions as $txn) {
                \App\Models\Transaction::firstOrCreate(
                    ['reference_id' => $txn['reference_id']],
                    array_merge($txn, ['user_id' => $dealer->id])
                );
            }
        }
    }
}
