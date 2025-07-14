<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Facility::Create([
            'name' => 'Bangku taman',
            'jumlah' => '15',
            'tower_id' => 'A',
        ]);

        Facility::Create([
            'name' => 'Bangku taman',
            'jumlah' => '15',
            'tower_id' => 'A',
        ]);

        Facility::Create([
            'name' => 'Bangku taman',
            'jumlah' => '15',
            'tower_id' => 'A',
        ]);
    }
}
