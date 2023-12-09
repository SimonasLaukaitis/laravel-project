@extends('layouts.app')

@section('title', 'Conferences')

@section('content')

<div class="container">

    <h4 class="mt-4 mb-3">{{ __('app.conferences') }}</h4>
    <h4 class="mt-4 mb-3">{{ __('app.future_conferences') }}</h4>
    <div class="row">
    @if(count($conferences) > 0)
        @foreach($conferences as $conference)
            @php
                $currentDate = \Carbon\Carbon::now()->format('Y-m-d');
            @endphp

            @if($conference['event_date'] > $currentDate)
                <div class="col-md-6 mb-4">
                    <div class="card border-primary h-100">
                        <div class="card-body d-flex flex-column">
                            <label for="ev-name">{{ __('app.event_name') }}</label>
                            <h4 id="ev-name">{{ $conference['event_name'] }}</h4>
                            
                            <div class="mt-auto">
                                <br>
                                <a href="{{ route('worker.show', ['id' => $conference['id']]) }}" onclick="showLoading()" class="btn btn-primary">{{ __('app.more') }}</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @else
        <div class="col-md-12">
            <p>No conferences available.</p>
        </div>
    @endif
</div>


    <h4 class="mt-4 mb-3">{{ __('app.all_conferences') }}</h4>
    <div class="row">
        @if(count($conferences) > 0)
            @foreach($conferences as $conference)
            
                <div class="col-md-6 mb-4">
                    <div class="card border-primary h-100">
                        <div class="card-body d-flex flex-column">
                            <label for="ev-name">{{ __('app.event_name') }}</label>
                            <h4 id="ev-name">{{ $conference['event_name'] }}</h4>
                            
                            <div class="mt-auto">
                            <br>
                            <a href="{{ route('worker.show', ['id' => $conference['id']]) }}" onclick="showLoading()" class="btn btn-primary">{{ __('app.more') }}</a>
                         
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-12">
                <p>No conferences available.</p>
            </div>
        @endif
    </div>

</div>
@endsection
