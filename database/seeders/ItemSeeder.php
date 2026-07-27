<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\ItemCategory;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $foodCategory = ItemCategory::where('name', 'Makanan')->first();
        $clothesCategory = ItemCategory::where('name', 'Pakaian')->first();
        $medsCategory = ItemCategory::where('name', 'Obat-obatan')->first();
        $logisticCategory = ItemCategory::where('name', 'Logistik & Tenda')->first();

        $items = [
            ['item_category_id' => $foodCategory->id, 'name' => 'Beras', 'unit' => 'kg', 'description' => 'Beras putih medium/premium'],
            ['item_category_id' => $foodCategory->id, 'name' => 'Mie Instan', 'unit' => 'dus', 'description' => 'Mie instan aneka rasa'],
            ['item_category_id' => $foodCategory->id, 'name' => 'Air Mineral', 'unit' => 'dus', 'description' => 'Air mineral kemasan gelas/botol'],
            
            ['item_category_id' => $clothesCategory->id, 'name' => 'Selimut', 'unit' => 'pcs', 'description' => 'Selimut tebal untuk pengungsi'],
            ['item_category_id' => $clothesCategory->id, 'name' => 'Pakaian Dewasa', 'unit' => 'set', 'description' => 'Set pakaian pria/wanita dewasa'],
            
            ['item_category_id' => $medsCategory->id, 'name' => 'Paracetamol', 'unit' => 'strip', 'description' => 'Obat penurun panas dan pereda nyeri'],
            ['item_category_id' => $medsCategory->id, 'name' => 'Kotak P3K', 'unit' => 'box', 'description' => 'Peralatan pertolongan pertama pada kecelakaan'],
            
            ['item_category_id' => $logisticCategory->id, 'name' => 'Tenda Pengungsi', 'unit' => 'unit', 'description' => 'Tenda keluarga atau tenda pleton'],
            ['item_category_id' => $logisticCategory->id, 'name' => 'Tikar Lipat', 'unit' => 'pcs', 'description' => 'Tikar plastik lipat untuk alas tidur'],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
