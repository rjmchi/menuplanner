@extends('layouts.app')

@section('content')
<div class="container">
<h2>Add Guest</h2>
<form action="{{route('guests.store')}}" method="post">
    {{csrf_field()}}

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
        @if ($errors->has('name'))
            <div class="alert alert-danger">{{ $errors->first('name')}}</div>
        @endif
    </div>

    <div class="form-group">
        <label for="email_address">Email address</label>
        <input type="email" class="form-control" name="email_address" id="email_address" placeholder="Enter e-Mail Address">
        @if ($errors->has('email_address'))
        <div class="alert alert-danger">{{ $errors->first('email_address')}}</div>
        @endif

      </div>    

    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="send_invite" name="send_invite">
        <label class="form-check-label" for="send_invite">Send Invitation</label>

    <button type="submit" class="btn btn-primary">Submit</button>
    <input type="hidden" name="event_id" value="{{$event_id}}">
</form>

</div>
@endsection