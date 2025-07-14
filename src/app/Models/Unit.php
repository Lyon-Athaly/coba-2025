<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tower;
use App\Models\Occupancy;
use App\Models\MaintananceRequest;

class Unit extends Model
{
    protected $fillable = [
        'lantai',
        'luas',
        'status',
        'tower_id',
    ];
    public function tower()
    {
        return $this->belongsTo(Tower::class);
    }

    public function occupancy()
    {
        return $this->hasOne(Occupancy::class);
    }

    public function maintenanceRequests()
    {
        return $this->hasMany(MaintananceRequest::class);
    }
}
