<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Resident extends Model
{
    protected $table = 'residents';

    protected $fillable = [
        'user_id',
        'nama',
        'no_telepon',
        'email',
        'umur',
    ];

    // Relasi Resident dengan User dan Occupancy
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
