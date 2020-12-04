@extends('layouts.app')

@section('content')
<div class="container">
<h2>Events <a href="{{route('event.create')}}" class="btn btn-primary">New Event</a></h2>
<table class="table table-striped">
    <tr>
        <th>Name</th>
        <th>Location</th>
        <th>Date &amp; Time</th>
        <th>&nbsp;</th>
    </tr>

@foreach ($events as $event) 
<?php $dt = new Carbon\Carbon($event->date_time);?>
<tr>
    <td>{{$event->name}}</td>
    <td>{{$event->location}}</td>
    <td>{{$dt->toDayDateTimeString()}}</td>
    <td>
            <form action="{{route('event.destroy', [$event->id])}}" method="post">
                    {{csrf_field()}}
            <input type="hidden" name="_method" value="delete">
            <button class="btn btn-danger" type="submit">Delete <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
        </form>    
    </td>
</tr>
@endforeach

</table>
</div>
@endsection