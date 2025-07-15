<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tower;
use App\Models\MaintananceRequest;

class Unit extends Model
{
    protected $fillable = [
        'unit_id',
        'tower_id',
        'lantai',
        'status',
        'luas',
    ];
    public function tower()
    {
        return $this->belongsTo(Tower::class);
    }

    public function maintenanceRequests()
    {
        return $this->hasMany(MaintananceRequest::class);
    }
}
