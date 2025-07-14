<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;
use App\Models\Facility;
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
    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }
    public function staff()
    {
        return $this->hasMany(Staff::class);
    }

}
