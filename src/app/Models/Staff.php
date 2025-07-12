<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public function tower()
    {
        return $this->belongsTo(Tower::class);
    }
}
