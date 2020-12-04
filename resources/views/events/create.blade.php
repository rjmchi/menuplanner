@extends('layouts.app')

@section('content')
<div class="container">
<h2>New Event</h2>

<form method="post" action="{{route('events.store')}}">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="Event Name">
    </div>
    <div class="form-group">
        <label for="location">Location:</label>
        <input type="text" name="location" placeholder="Location">
    </div>
        <div class="form-group">	
                <label for="event_date">Event Date</label>
                <input name="event_date" type="date" id="event_date">
		
                <label for="event_time">Time</label>
                <input class="ampm" placeholder="HH" name="hh" type="number" value="">
                :
                <input class="ampm" placeholder="MM" name="mm" type="number" value="">
                <label for=""> AM</label>
                <input name="ampm" type="radio" value="am">
                <label for=""> PM</label>
                <input checked="checked" name="ampm" type="radio" value="pm">	
            </div>
            <div class="form-group">
                <textarea class="form-control" name="notes" placeholder="Notes:"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create Event</button>
            </div>
</form>
</div>
@endsection