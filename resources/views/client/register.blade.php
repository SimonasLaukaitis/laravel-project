@extends('layouts.app')

@section('title', 'Conferences')

@section('content')

<div class="container">
    registracija
    {{-- <h1 class="mt-4">{{ __('app.conf_reg') }}</h1>

    @if(isset($conf))

        <div class="card my-4">
            <div class="card-body">
                <h2 class="card-title">{{ $conf['event_name'] }}</h2>
                <p class="card-text"><strong>{{ __('app.location') }}:</strong> {{ $conf['location'] }}</p>
                <p class="card-text">{{ $conf['event_date'] }}</p>
                <button class="btn btn-primary">{{ __('app.register') }}</button>  
                
            </div>
        </div>

    @else
        <p class="alert alert-warning">{{ __('app.conference_not_found') }}</p>
    @endif --}}

</div>

@endsection
