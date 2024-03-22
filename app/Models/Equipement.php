<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    public function equipements():BelongsToMany
    {
        return $this->belongsToMany(Equipement::class);
    }
}
