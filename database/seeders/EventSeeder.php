<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = \App\Models\User::first();
        $e = new \App\Models\Event;
        $e->name = 'Thanksgiving';
        $e->location = "Robert & Howard's";
        $e->user_id = $u->id;
        $e->date_time = \Carbon\Carbon::create(2018, 11, 28, 1, 30, 0, null);
        $e->save();    }
}
