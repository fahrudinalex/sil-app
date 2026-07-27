<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat 1 user Admin khusus agar mudah login saat testing
        User::factory()->admin()->create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
        ]);

        // Membuat 4 user Petugas Lapangan secara acak
        User::factory()->count(4)->fieldOfficer()->create();
    }
}
