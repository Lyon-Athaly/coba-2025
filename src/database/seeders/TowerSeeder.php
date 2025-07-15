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
            'jumlah_lantai' => $lantaiA = 10,
            'jumlah_unit' => 20*$lantaiA,
        ]);

        Tower::firstOrCreate([
            'tower_id' => 'B',
            'jumlah_lantai' => $lantaiB = 10,
            'jumlah_unit' => 20*$lantaiB,
        ]);
    }
}