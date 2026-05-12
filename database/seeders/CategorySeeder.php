<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Welding Machines',
            'Welding Accessories',
            'Safety Gear',
            'Gas Equipment',
            'Abrasives',
            'Power Tools'
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(
                ['name' => $cat],
                ['slug' => Str::slug($cat)]
            );
        }
    }
}
