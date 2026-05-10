<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class UpdateCategoriesSeeder extends Seeder
{
    public function run()
    {
        $mapping = [
            'Sets' => 'Welding & Cutting Sets',
            'Torches & Attachments' => 'Cutting & Welding Attachments',
            'Nozzles' => 'Nozzles',
            'Safety & Accessories' => 'Safety & Protection',
            'Regulators' => 'Regulators',
            'Cutting' => 'Welding & Cutting Sets',
            'Accessories' => 'Consumables & Small Items',
            'Connectors' => 'Connectors & Fittings',
            'Torch Spares' => 'Consumables & Small Items',
            'Filler Materials' => 'Consumables & Small Items',
            'Torches' => 'MIG Welding Products',
        ];

        foreach ($mapping as $old => $new) {
            Product::where('category', $old)->update(['category' => $new]);
        }

        // Catch-all for any other products
        Product::whereNotIn('category', array_values($mapping))
            ->update(['category' => 'Consumables & Small Items']);

        // Specific overrides for "Gas Equipment & Accessories"
        Product::where('name', 'like', '%GAS LENCE%')
            ->orWhere('name', 'like', '%GAS LANCE%')
            ->orWhere('name', 'like', '%HEATING TORCH BURNER%')
            ->orWhere('name', 'like', '%GRAND CUTTER%')
            ->update(['category' => 'Gas Equipment & Accessories']);

        // Specific overrides for "MIG Welding Products"
        Product::where('name', 'like', '%MIG%')
            ->update(['category' => 'MIG Welding Products']);

        // Specific overrides for "TIG Welding Products"
        Product::where('name', 'like', '%TIG%')
            ->orWhere('name', 'like', '%Tungsten%')
            ->orWhere('name', 'like', '%Collet%')
            ->orWhere('name', 'like', '%Aluminium%')
            ->orWhere('name', 'like', '%CCMS%')
            ->update(['category' => 'TIG Welding Products']);

        // Correct spelling for Lence if it was a typo
        Product::where('name', 'like', '%GAS LENCE%')->each(function($p) {
            $p->name = str_replace('LENCE', 'LANCE', $p->name);
            $p->save();
        });
            
        $this->command->info('Products categorized successfully!');
    }
}
