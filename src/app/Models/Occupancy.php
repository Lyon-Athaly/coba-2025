<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resident;
use App\Models\Unit;

class Occupancy extends Model
{
    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
