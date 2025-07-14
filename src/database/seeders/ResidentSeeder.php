<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resident;
use App\Models\User;

class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat 10 user dummy dulu untuk relasi
        User::factory(10)->create()->each(function ($user) {
            Resident::create([
                'user_id'     => $user->id,
                'nama'        => fake()->name(),
                'no_telepon'  => fake()->phoneNumber(),
                'email'       => fake()->unique()->safeEmail(),
                'umur'        => fake()->numberBetween(20, 60),
            ]);
        });
    }
}
