<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    public function guest() {
        return $this->belongsTo(Guest::class);
    }
    public function item() {
        return $this->belongsTo(Item::class);
    }
    public function event() {
        return $this->belongsTo(Event::class);
    }
}
