<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\ItemVariant;
use App\Models\Warehouse;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ItemVariantSeeder extends Seeder
{
    public function run(): void
    {
        $mainWarehouse = Warehouse::where('name', 'Gudang Utama Dinsos Prov Jateng')->first();
        $soloWarehouse = Warehouse::where('name', 'Gudang Regional Surakarta')->first();

        $beras = Item::where('name', 'Beras')->first();
        $mie = Item::where('name', 'Mie Instan')->first();
        $tenda = Item::where('name', 'Tenda Pengungsi')->first();
        $selimut = Item::where('name', 'Selimut')->first();

        $variants = [
            [
                'item_id' => $beras->id, 
                'warehouse_id' => $mainWarehouse->id, 
                'variant_name' => 'Beras Medium 5kg', 
                'stock_quantity' => 1000, 
                'minimum_stock' => 100,
                'expired_at' => Carbon::now()->addMonths(6),
            ],
            [
                'item_id' => $mie->id, 
                'warehouse_id' => $mainWarehouse->id, 
                'variant_name' => 'Indomie Rasa Ayam Bawang', 
                'stock_quantity' => 500, 
                'minimum_stock' => 50,
                'expired_at' => Carbon::now()->addMonths(8),
            ],
            [
                'item_id' => $tenda->id, 
                'warehouse_id' => $soloWarehouse->id, 
                'variant_name' => 'Tenda Keluarga 4x4m', 
                'stock_quantity' => 20, 
                'minimum_stock' => 5,
                'expired_at' => null,
            ],
            [
                'item_id' => $selimut->id, 
                'warehouse_id' => $soloWarehouse->id, 
                'variant_name' => 'Selimut Tebal Dewasa', 
                'stock_quantity' => 200, 
                'minimum_stock' => 20,
                'expired_at' => null,
            ],
        ];

        foreach ($variants as $variant) {
            ItemVariant::create($variant);
        }
    }
}
