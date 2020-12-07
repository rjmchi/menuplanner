@component('mail::message')
# {{$guest->name}} you've been invited!

You have been invited to {{$event->location}} for {{$event->name}}.
Please click the button below to RSVP and let us know what you will be bringing.

{{$event->guests->where('id', $guest->id)->first()->pivot->uuid}}

{{config('app.url')}}

<a href="{{URL::to('/guest')}}/{{$event->guests->where('id', $guest->id)->first()->pivot->uuid}}">RSVP</a>

@php 
    $url = URL::to('/guest');
    $url .= '/';
    $url .= $event->guests->where('id', $guest->id)->first()->pivot->uuid
@endphp

@component('mail::button', ['url' =>  $url])
RSVP
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
