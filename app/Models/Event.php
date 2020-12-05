<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function guests() {
        return $this->belongsToMany(Guest::class)
            ->withPivot('uuid', 'attending', 'invite_sent');
    }

    public function dishes() {
        return $this->hasMany(Dish::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
