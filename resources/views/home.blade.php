@extends('layouts.app')

@section('content')

<div class="container">
    <div class="well">
        <a href="{{route('events.create')}}" class="btn btn-primary">New Event</a>
    </div>
    <div class="well">
        <p>Please select an event</p>
    </div>
    @foreach ($events as $event)
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2><a href="{{route('events.show', $event->id)}}">{{$event->name}}</a></h2>
                    </div>
                    <div class="card-text">
                        <p>{{$event->location}}</p>
                        <p>{{$event->date_time}}</p>
                        <p>{{$event->notes}}</p>

                        <form action="{{route('events.destroy', $event->id)}}" method="POST"> 
                            @csrf
                            @method ('delete')
                            <button type="submit"  class="btn btn-danger btn-sm">Delete</span></button> 
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach

</div>
@endsection
