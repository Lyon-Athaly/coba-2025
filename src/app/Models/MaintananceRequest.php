<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;
use App\Models\Staff;

class MaintananceRequest extends Model
{
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
