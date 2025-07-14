<?php

namespace Database\Seeders;

use App\Models\Tower;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TowerSeeder extends Seeder
{
    public function run(): void
    {
        Tower::firstOrCreate([
            'tower_id' => 'A',
            'jumlah_lantai' => $lantaiA = 15,
            'jumlah_unit' => 30*$lantaiA,
        ]);

        Tower::firstOrCreate([
            'tower_id' => 'B',
            'jumlah_lantai' => $lantaiB = 20,
            'jumlah_unit' => 30*$lantaiB,
        ]);
    }
}