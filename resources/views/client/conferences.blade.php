@extends('layouts.app')

@section('title','Conferences')

@section('content')


<div class="container">

    <h5 class="mt-4 mb-3">{{ __('app.conferences') }}</h5>

    <div class="row">
        <div class="col-md-12">
      @if(count($conferences) > 0)
    <ul class="list-group">
        @foreach($conferences as $conference)
            <li class="list-group-item">
                <label for="ev-name">{{ __('app.event_name') }}</label>
                <h4 id="ev-name">{{ $conference['event_name'] }}</h4>

                @if(isset($conference['event_date']))
                    <h5>{{ $conference['event_date'] }}</h5>
                @endif

                <label for="ev-location">{{ __('app.location') }}</label>
                <h5 id="ev-location">{{ $conference['location'] }}</h5>
                 <p>{{ __('app.registered_users') }}</p>
                @if(isset($conference['registered_users']) && count($conference['registered_users']) > 0)
                   
                    <ul>
                        @foreach($conference['registered_users'] as $user)
                            <li>{{ $user }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>{{ __('app.no_registered_users') }}</p>
                @endif
            </li>
        @endforeach
    </ul>
@else
    <p>No conferences available.</p>
@endif

        </div>
    </div>
</div>
@endsection