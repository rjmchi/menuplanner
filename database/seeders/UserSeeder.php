<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new \App\Models\User;
        $u->name = 'Robert';
        $u->email = 'robert@rjmchicago.com';
        $u->password = Hash::make('R0b3rt!');
        $u->remember_token = Str::random(10);
        $u->admin = true;
        $u->save();    
    }
}
