<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resident extends Model
{
    protected $table = 'clients';

    protected $fillable = [
        'user_id',
        'phone'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
