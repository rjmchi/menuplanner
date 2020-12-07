<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Guest;
use App\Models\EventGuest;
use App\Mail\Invite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['events'] = Auth::user()->events;
        return view('home')->with($data);    
    }

    public function sendInvite(Event $event, Guest $guest) {
        $event->guests()->updateExistingPivot($guest->id,['invite_sent'=>true]);

        $data['event']=$event;
        $data['guest'] = $guest;
        \Mail::to($guest->email_address)->send(new Invite($data));   
        return redirect(route('events.show', $event->id));
    }
}
