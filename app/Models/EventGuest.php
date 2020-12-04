<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EventGuest extends Pivot
{
    use HasFactory;

    public function dishes(){
        return $this->hasMany(Dish::classs);
    }
}
