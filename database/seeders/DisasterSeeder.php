<?php

namespace Database\Seeders;

use App\Models\Disaster;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DisasterSeeder extends Seeder
{
    public function run(): void
    {
        $disasters = [
            [
                'name' => 'Banjir Bandang Demak', 
                'type' => 'Banjir', 
                'location_name' => 'Kecamatan Karanganyar, Kab. Demak', 
                'address' => 'Desa Ketanjung dan Karanganyar',
                'latitude' => -6.8667,
                'longitude' => 110.7667,
                'occurred_at' => Carbon::now()->subDays(5),
                'description' => 'Banjir akibat tanggul jebol yang merendam ribuan rumah.',
                'status' => 'active',
            ],
            [
                'name' => 'Longsor Banjarnegara', 
                'type' => 'Tanah Longsor', 
                'location_name' => 'Kecamatan Karangkobar, Kab. Banjarnegara', 
                'address' => 'Jalan Provinsi Penghubung Banjarnegara - Pekalongan',
                'latitude' => -7.2651,
                'longitude' => 109.7360,
                'occurred_at' => Carbon::now()->subDays(2),
                'description' => 'Longsor menutup akses jalan dan merusak beberapa rumah warga.',
                'status' => 'active',
            ],
            [
                'name' => 'Kebakaran Pasar Kliwon', 
                'type' => 'Kebakaran', 
                'location_name' => 'Pasar Kliwon, Kota Surakarta', 
                'address' => 'Komplek Pertokoan dan Pemukiman Padat',
                'latitude' => -7.5816,
                'longitude' => 110.8290,
                'occurred_at' => Carbon::now()->subMonths(1),
                'description' => 'Kebakaran besar yang menghanguskan puluhan kios dan rumah.',
                'status' => 'resolved',
            ]
        ];

        foreach ($disasters as $disaster) {
            Disaster::create($disaster);
        }
    }
}
