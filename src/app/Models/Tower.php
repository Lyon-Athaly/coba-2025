<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;
use App\Models\Staff;

class Tower extends Model
{
    protected $table = 'towers';
    protected $guarded = ['id'];

    // app/Models/Tower.php



    // Relasi Tower dengan Unit, Facility, dan Staff
    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function staff()
    {
        return $this->hasMany(Staff::class);
    }

    protected static function booted()
    {
        static::created(function ($tower) {
            $unitPerFloor = 20;
            $totalFloors = $tower->jumlah_lantai;
            $towerCode = $tower->tower_id;

            for ($floor = 1; $floor <= $totalFloors; $floor++) {
                for ($i = 1; $i <= $unitPerFloor; $i++) {
                    $floorPadded = str_pad($floor, 2, '0', STR_PAD_LEFT);
                    $unitPadded = str_pad($i, 2, '0', STR_PAD_LEFT);
                    $unitId = $towerCode . $floorPadded . $unitPadded;

                    \App\Models\Unit::create([
                        'tower_id' => $tower->id,
                        'unit_id' => $unitId,
                        'lantai' => $floor,
                        'status' => 'available',
                        'luas' => '10'
                    ]);
                }
            }

            // Update jumlah unit otomatis
            $tower->update([
                'jumlah_unit' => $unitPerFloor * $totalFloors,
            ]);
        });
    }


}
