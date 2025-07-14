<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Staff::create([
            'name' => 'Jonathan Teknisi',
            'tower_id' => 1, // Pastikan tower dengan id 1 sudah ada
            'posision' => 'Teknisi',
            'email' => 'teknisi@towerA.com',
            'telp' => '081234567891',
        ]);

        Staff::create([
            'name' => 'Maria Keamanan',
            'tower_id' => 2,
            'posision' => 'Keamanan',
            'email' => 'keamanan@towerB.com',
            'telp' => '082234567892',
        ]);

        Staff::create([
            'name' => 'Rafi Kebersihan',
            'tower_id' => 1,
            'posision' => 'Kebersihan',
            'email' => 'kebersihan@towerA.com',
            'telp' => '083234567893',
        ]);
    }
}
