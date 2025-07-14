<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tower;

class Facility extends Model
{
    public function tower()
    {
        return $this->belongsTo(Tower::class);
    }
}
