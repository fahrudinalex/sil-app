<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    public function run(): void
    {
        $warehouses = [
            ['name' => 'Gudang Utama Dinsos Prov Jateng', 'address' => 'Jl. Pahlawan No. 12, Semarang Selatan, Kota Semarang'],
            ['name' => 'Gudang Regional Surakarta', 'address' => 'Jl. Slamet Riyadi No. 100, Banjarsari, Kota Surakarta'],
            ['name' => 'Gudang Regional Banyumas', 'address' => 'Jl. Jend. Soedirman No. 45, Purwokerto Timur, Kab. Banyumas'],
        ];

        foreach ($warehouses as $warehouse) {
            Warehouse::create($warehouse);
        }
    }
}
