<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guest = new \App\Models\Guest;
        $guest->name = 'Robert';
        $guest->email_address = 'robert@rjmchicago.com';
        $guest->save();

        $e = \App\Models\Event::find(1);
        $e->guests()->attach($guest->id);

        $guest = new \App\Models\Guest;
        $guest->name = 'Howard';
        $guest->email_address = 'howard@chicagopotters.com';
        $guest->save(); 
        $e->guests()->attach($guest->id);
    }
}
