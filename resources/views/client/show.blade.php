@extends('layouts.app')

@section('title', 'Conferences')

@section('content')

<div class="container">
    <h1 class="mt-4">Konferencijos informacija</h1>

    @if(isset($conf))

        <div class="card my-4">
            <div class="card-body">
                <h2 class="card-title">{{ $conf['event_name'] }}</h2>
                <p class="card-text"><strong>{{ __('app.location') }}:</strong> {{ $conf['location'] }}</p>
                <p class="card-text">{{ $conf['event_date'] }}</p>
                <p class="card-text"><strong>{{ __('app.registered_users') }}:</strong></p>
                <ul class="list-group">
                    @forelse($conf['registered_users'] as $user)
                        <li class="list-group-item">{{ $user }}</li>
                    @empty
                        <li class="list-group-item">{{ __('app.no_registered_users') }}</li>
                    @endforelse
                </ul>
            </div>
        </div>

    @else
        <p class="alert alert-warning">{{ __('app.conference_not_found') }}</p>
    @endif

</div>




@endsection
