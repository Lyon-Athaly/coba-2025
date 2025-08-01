<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MaintananceRequest;
use App\Models\Resident;
use App\Models\Staff;
use App\Models\Tower;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            MaintananceRequestSeeder::class,
            ResidentSeeder::class,
            TowerSeeder::class,
            StaffSeeder::class,
            UnitSeeder::class,
        ]);
    }
}
