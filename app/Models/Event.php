<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function guests() {
        return $this->belongsToMany(Guest::class);
    }

    public function dishes() {
        return $this->hasMany(Dish::class);
    }
}
