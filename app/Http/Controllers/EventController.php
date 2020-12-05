<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Dish;
use App\Models\Item;
use App\Models\Guest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['events'] = Event::orderBy('date_time')->get();
        return view('admin.events.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hh = $request->input('ampm')=='am'? $request->input('hh'):$request->input('hh')+12;
        $dt = $request->input('event_date') .  ' '. $hh .':'. $request->input('mm');
        $e = new Event;
        $e->name = $request->input('name');
        $e->location = $request->input('location');
        $e->date_time = new Carbon($dt);
        $e->notes = $request->input('notes');
        $e->user_id = Auth::user()->id;
        $e->save();

        $g = Guest::where('email_address', '=', $e->user->email)->first();

        if (!$g) {
            $g = new Guest;
            $g->name = $e->user->name;
            $g->email_address = $e->user->email;
            $g->save();
        }
        $g->events()->attach($e->id);

        return redirect(route('events.show', $e->id));    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $data['event'] = $event;
        $data['items'] = Item::get();

        session(['event' => $event->id]);

        return view('events.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect(route('home'));   
    }
}
