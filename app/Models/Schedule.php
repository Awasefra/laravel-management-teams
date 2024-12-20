<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    protected $guarded = ['id'];

    public function personnel(): BelongsTo
    {
        return $this->belongsTo(Personnel::class);
    }
}
