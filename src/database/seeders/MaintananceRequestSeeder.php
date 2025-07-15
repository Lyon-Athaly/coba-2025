<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MaintananceRequest;
        
class MaintananceRequestSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'unit_id' => 'B0101',
                'tanggal' => '2025-07-15',
                'deskripsi' => 'Keran bocor',
                'staff' => 'S001',
                'status' => 'on process',
            ],
            [
                'unit_id' => 'B0202',
                'tanggal' => '2025-07-14',
                'deskripsi' => 'AC tidak dingin',
                'staff' => null,
                'status' => 'pending',
            ],
            [
                'unit_id' => 'B0303',
                'tanggal' => '2025-07-10',
                'deskripsi' => 'Lampu mati',
                'staff' => 'S003',
                'status' => 'finish',
            ],
            [
                'unit_id' => 'B0404',
                'tanggal' => '2025-07-12',
                'deskripsi' => 'WC mampet',
                'staff' => null,
                'status' => 'cancel',
            ],
        ];

        foreach ($data as $item) {
            MaintananceRequest::create($item);
        }
    }
}
