<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tower;
use App\Models\MaintananceRequest;

class Staff extends Model
{

    // Relasi Staff dengan User, Tower, dan MaintananceRequest
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tower()
    {
        return $this->belongsTo(Tower::class);
    }
    public function maintenanceRequests()
    {
        return $this->hasMany(MaintananceRequest::class);
    }
}
