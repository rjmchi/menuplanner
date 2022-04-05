@extends('layouts.app')
@section('content')

<div class="jumbotron">
    <div class="container">
        <h2>{{$event->name}}</h2>
        <h3>{{$event->location}}</h3>
        <p>{{ Carbon\Carbon::parse($event->date_time)->toDayDateTimeString() }}</p>
        <p>{{$event->notes}}</p>
    </div>
</div> 
  
<div class="container-sm">
    <div class="row header">
        <div class="col-sm-4">Name</div>
        <div class="col-sm-3">Item</div>
        <div class="col-sm-3">Dish</div>
        <div class="col-sm-2">&nbsp;</div>
    </div>
    @foreach ($event->dishes()->orderBy('item_id')->get() as $dish)
        <div class="row line">
            <div class="col-sm-4"> {{$dish->guest->name}} </div>
            <div class="col-sm-3"> {{$dish->item->name}}</div>
            <div class="col-sm-3">{{$dish->name}} </div>
            <div class="col-sm-2">
                <form action="{{route('dishes.destroy', [$dish->id])}}" method="post">
                @csrf
                @method('delete')
                <button class="btn-sm btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
    <div class="guests">
        <h3>Select Items to bring</h3>
            <form action="{{route('dishes.store')}}" method="post">
                @csrf
                <input type="hidden" name="guest_id" value="{{$guest->id}}">
                <input type="hidden" name="event_id" value="{{$event->id}}">
                <input type="hidden" name="uuid" value="{{$uuid}}">
                <div class="name">{{$guest->name}}</div>
                <div class="form-group">
                    <select name="item_id" class="form-control">
                        @foreach ($items as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select> 
                </div>
                <div class="form-group"><input class="form-control" type="text" name="dish" id="dish"></div>
                <div><button type="submit" class="btn-sm btn-primary">Add</button></div>
            </form>
</div>

@endsection