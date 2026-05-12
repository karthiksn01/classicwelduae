<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class NewProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate existing products to replace "everything" as requested
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $products = [
            // WELDING & CUTTING SETS
            ['name' => 'CW-WC-21P WELDING & CUTTING SET', 'retail_price' => 800.00, 'dealer_price' => 850.00, 'category' => 'Sets'],
            
            // ATTACHMENTS & HANDLES
            ['name' => 'CW-CA-212 CUTTING ATTACHMENT H/D', 'retail_price' => 105.00, 'dealer_price' => 125.00, 'category' => 'Torches & Attachments'],
            
            // REGULATORS
            ['name' => 'OXYGEN REGULATOR HD CW-OX-HD-1', 'retail_price' => 155.00, 'dealer_price' => 175.00, 'category' => 'Regulators'],
            
            // HEATING TORCHES
            ['name' => 'HEATING TORCH BURNER TYPE-30 CM (WITH 50MM BURNER) HT-350', 'retail_price' => 50.00, 'dealer_price' => 55.00, 'category' => 'Torches & Attachments'],
            
            // TIG TORCH & MIG TORCH
            ['name' => 'TIG TORCH WP18 FV-4 MTR CLASSIC WELD CW-WP-18-FV-4 MTR', 'retail_price' => 130.00, 'dealer_price' => 130.00, 'category' => 'Torches'],
        ];

        foreach ($products as $productData) {
            $catName = $productData['category'] ?? 'General';
            $category = \App\Models\Category::firstOrCreate(
                ['name' => $catName],
                ['slug' => strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $catName))]
            );

            Product::create([
                'name' => $productData['name'],
                'description' => $productData['description'] ?? 'Classic Weld Trading LLC Product',
                'retail_price' => $productData['retail_price'],
                'dealer_price' => $productData['dealer_price'],
                'moq' => 1,
                'category' => $catName,
                'category_id' => $category->id,
                'stock' => 100, // Default stock
                'image' => (function() use ($productData) {
                    $map = [
                        'CW-WC-21P' => 'welding-cutting-set-21p.jpg',
                        'CW-CA-212' => 'cutting-attachment-cw-ca-222.jpg',
                        'CW-CA-222' => 'cutting-attachment-cw-ca-222.jpg',
                        'CW-TH-211' => 'torch-handle-cw-th-211.jpg',
                        'CW-TH-221' => 'torch-handle-cw-th-221.jpg',
                        'CW-WN-1,' => 'welding-nozzle-1.jpg',
                        'CW-WN-5,' => 'welding-nozzle-5.jpg',
                        'CW-CN-GPN-00' => 'cutting-nozzle-gpn-00.jpg',
                        'CW-CN-GPN-1,' => 'cutting-nozzle-gpn-1.jpg',
                        'CW-CN-ANME-2' => 'cutting-nozzle-anme-2.jpg',
                        'CW-CN-00-1-101' => 'cutting-nozzle-1-101-00.jpg',
                        'CW-FA-288-R' => 'flashback-arrestor-oxy-288.jpg',
                        'CW-FA-288-L' => 'flashback-arrestor-ace-288.jpg',
                        'CW-FA-388-R' => 'flashback-arrestor-oxy-388.jpg',
                        'CW-FA-388-L' => 'flashback-arrestor-ace-388.jpg',
                        'CW-HN-8' => 'heating-nozzle-cw-hn-8.jpg',
                        'CW-AR-25-2FL' => 'argon-regulator-cw-ar-25-2fl.jpg',
                        'CW-AR-25-FL' => 'argon-regulator-cw-ar-25-fl.jpg',
                        'CW-AR-10M-2D' => 'argon-regulator-cw-ar-10m-2d.jpg',
                        'CW-CD-25-FL' => 'co2-regulator-cw-cd-25-fl.jpg',
                        'CW-N2-50M-2D' => 'nitrogen-regulator-cw-n2-50m-2d.jpg',
                        'CW-EH-800A-J' => 'electrode-holder-japan-800a.jpg',
                        'CW-EH-600A-J' => 'electrode-holder-japan-600a.jpg',
                        'CW-WH-600A' => 'welding-holder-brass-600a.jpg',
                        'CW-WH-500A' => 'welding-holder-brass-500a.jpg',
                        'CW-EC-600' => 'earth-clamp-600a.jpg',
                        'CW-EC-500' => 'earth-clamp-500a.jpg',
                        'HT-350' => 'heating-torch-ht-350.jpg',
                        'CW-K4000' => 'gouging-torch-k4000.jpg',
                        'CW-WP-26-FV-4' => 'tig-torch-wp26fv-4m.jpg',
                        'CW-15AK-3' => 'mig-torch-15ak-3m.jpg',
                        'CW-25AK-3' => 'mig-torch-25ak-3m.jpg',
                        'CW-36 KD-3' => 'mig-torch-36kd-3m.jpg',
                        'CW-36 KD-4' => 'mig-torch-36kd-4m.jpg',
                        'CW-501D - 3MTR' => 'mig-torch-501d-3m.jpg',
                        'CW-PSF-250' => 'mig-torch-psf250-4.5m.jpg',
                        'CW-PSF-310' => 'mig-torch-psf310-4.5m.jpg',
                        'CW-PSF-405' => 'mig-torch-psf405-4.5m.jpg',
                        'CW-Q30' => 'mig-torch-q30-4m.jpg',
                        'CW-LPG-HD' => 'lpg-regulator-hd-2d.jpg',
                    ];
                    foreach ($map as $key => $img) {
                        if (str_contains($productData['name'], $key)) return $img;
                    }
                    return 'default.png';
                })(),
            ]);
        }
    }
}
