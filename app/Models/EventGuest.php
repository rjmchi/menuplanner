<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EventGuest extends Pivot
{
    use HasFactory;

    public $timestamps = false;

    public function dishes(){
        return $this->hasMany(Dish::classs);
    }

    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function guest() {
        return $this->belongsTo(Guest::class);
    }
}
