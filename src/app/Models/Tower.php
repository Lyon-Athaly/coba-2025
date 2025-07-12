<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tower extends Model
{
    protected $table = 'companies';
    protected $guarded = ['id'];

    // app/Models/Tower.php
    public function staff()
    {
        return $this->hasMany(Staff::class);
    }

}
