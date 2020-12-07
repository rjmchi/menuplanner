<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventGuest;
use App\Models\Guest;
use App\Models\Event;
use App\Models\Item;

class InviteController extends Controller
{
    public function guest($uuid) {
        $eg = EventGuest::where('uuid', $uuid)->first();
        $data['uuid']= $uuid;
        $data['guest'] =$eg->guest;
        $data['event'] = $eg->event;
        $data['items'] = Item::all();
        return view('attending')->with($data);
    }
}
