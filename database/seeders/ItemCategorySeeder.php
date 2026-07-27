<?php

namespace Database\Seeders;

use App\Models\ItemCategory;
use Illuminate\Database\Seeder;

class ItemCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Makanan', 'description' => 'Bantuan berupa bahan pangan pokok dan makanan siap saji'],
            ['name' => 'Pakaian', 'description' => 'Bantuan pakaian layak pakai, selimut, dan perlengkapan tidur'],
            ['name' => 'Obat-obatan', 'description' => 'Bantuan medis, P3K, dan obat-obatan esensial'],
            ['name' => 'Logistik & Tenda', 'description' => 'Bantuan berupa tenda pengungsi, tikar, velbed, dan alat penerangan'],
        ];

        foreach ($categories as $category) {
            ItemCategory::create($category);
        }
    }
}
