<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Personnel extends Model
{
    protected $guarded = ['id'];

    public function personnelProjects(): HasMany
    {
        return $this->hasMany(PersonnelProject::class);
    }

    public function schedhules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}
