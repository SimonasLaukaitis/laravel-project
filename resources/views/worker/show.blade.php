@extends('layouts.app')

@section('title', 'Conferences')

@section('content')
<div class="container">
    <h1 class="mt-4">{{ __('app.conference_info') }}</h1>

    @if(isset($conferences))
        
        <div class="card my-4">
            <div class="card-body">
                <h2 class="card-title">{{ $conferences['event_name'] }}</h2>
                <p class="card-text"><strong>{{ __('app.location') }}:</strong> {{ $conferences['location'] }}</p>
                <p class="card-text"><strong>{{ __('app.date') }}:</strong> {{ $conferences['event_date'] }}</p>
                <p class="card-text"><strong>{{ __('app.info') }}:</strong></p>
                <p class="card-text">{{ $conferences['info'] }}</p>
                <p class="card-text"><strong>{{ __('app.registered_users') }}:</strong></p>
                <ul class="list-group">
                    @forelse($conferences['registered_users'] as $user)
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
