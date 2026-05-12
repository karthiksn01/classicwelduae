<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $weldingMachineCat = Category::where('name', 'Welding Machines')->first();
        $safetyGearCat = Category::where('name', 'Safety Gear')->first();

        Product::create([
            'name' => 'ClassicWeld Pro MIG-250',
            'description' => 'Professional grade MIG welding machine with advanced inverter technology.',
            'retail_price' => 1250.00,
            'category' => 'Welding Machines',
            'category_id' => $weldingMachineCat->id,
            'image' => 'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?auto=format&fit=crop&q=80&w=800',
            'stock' => 15,
            'is_hot_sale' => true,
            'features' => ['250A Output', 'IGBT Inverter', 'Gas/Gasless'],
            'specifications' => ['Voltage: 220V', 'Weight: 12kg'],
            'warranty_years' => 2
        ]);

        Product::create([
            'name' => 'Elite Auto-Darkening Helmet',
            'description' => 'True color welding helmet with wide viewing area.',
            'retail_price' => 85.00,
            'category' => 'Safety Gear',
            'category_id' => $safetyGearCat->id,
            'image' => 'https://images.unsplash.com/photo-1530124564312-6f06451def58?auto=format&fit=crop&q=80&w=800',
            'stock' => 50,
            'is_hot_sale' => false,
            'features' => ['4 Sensors', 'DIN 5-13', 'Grind Mode'],
            'specifications' => ['Response Time: 1/30000s'],
            'warranty_years' => 1
        ]);
    }
}
